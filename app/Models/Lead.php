<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Lead extends Model
{
    use HasFactory, SoftDeletes;

    public const STATUS_NEW = 'new';
    public const STATUS_CONTACTED = 'contacted';
    public const STATUS_QUALIFIED = 'qualified';
    public const STATUS_PROPOSAL_SENT = 'proposal_sent';
    public const STATUS_WON = 'won';
    public const STATUS_LOST = 'lost';

    public const CATEGORY_SOFTWARE = 'software_engineering';
    public const CATEGORY_BPO = 'bpo_customer_support';
    public const CATEGORY_FINANCE = 'finance_backoffice';
    public const CATEGORY_MARKETING = 'digital_marketing';

    protected $fillable = [
        'uuid',
        'customer_id',
        'company_name',
        'contact_name',
        'contact_email',
        'contact_phone',
        'service_category',
        'team_size_needed',
        'estimated_budget',
        'calculator_inputs',
        'status',
        'assigned_to',
        'source',
        'notes',
        'ip_address',
        'user_agent',
    ];

    protected function casts(): array
    {
        return [
            'calculator_inputs' => 'array',
            'estimated_budget' => 'decimal:2',
            'team_size_needed' => 'integer',
        ];
    }

    protected static function booted(): void
    {
        static::creating(function (Lead $lead) {
            if (empty($lead->uuid)) {
                $lead->uuid = (string) Str::uuid();
            }
        });
    }

    /**
     * The assigned Account Executive / Employee.
     */
    public function assignedEmployee(): BelongsTo
    {
        return $this->belongsTo(User::class, 'assigned_to');
    }

    /**
     * The associated Customer user (if registered/claimed).
     */
    public function customer(): BelongsTo
    {
        return $this->belongsTo(User::class, 'customer_id');
    }

    /**
     * Internal notes and stage audit memos.
     */
    public function leadNotes(): HasMany
    {
        return $this->hasMany(LeadNote::class, 'lead_id')->latest();
    }

    /**
     * Alias for leadNotes relationship.
     */
    public function notes(): HasMany
    {
        return $this->hasMany(LeadNote::class, 'lead_id')->latest();
    }

    /**
     * Scope: Filter by assigned employee.
     */
    public function scopeAssignedTo($query, int $userId)
    {
        return $query->where('assigned_to', $userId);
    }

    /**
     * Scope: Filter for customer portal.
     */
    public function scopeForCustomer($query, int $customerId, ?string $email = null)
    {
        return $query->where(function ($q) use ($customerId, $email) {
            $q->where('customer_id', $customerId);
            if ($email) {
                $q->orWhere('contact_email', $email);
            }
        });
    }

    /**
     * Scope: Filter by status.
     */
    public function scopeFilterStatus($query, ?string $status)
    {
        if (! empty($status) && in_array($status, [
            self::STATUS_NEW,
            self::STATUS_CONTACTED,
            self::STATUS_QUALIFIED,
            self::STATUS_PROPOSAL_SENT,
            self::STATUS_WON,
            self::STATUS_LOST,
        ], true)) {
            return $query->where('status', $status);
        }
        return $query;
    }

    /**
     * Scope: Filter by service category.
     */
    public function scopeFilterCategory($query, ?string $category)
    {
        if (! empty($category)) {
            return $query->where('service_category', $category);
        }
        return $query;
    }

    /**
     * Scope: Text search across company, contact name, and email.
     */
    public function scopeSearch($query, ?string $term)
    {
        if (empty($term)) {
            return $query;
        }

        return $query->where(function ($q) use ($term) {
            $q->where('company_name', 'like', "%{$term}%")
              ->orWhere('contact_name', 'like', "%{$term}%")
              ->orWhere('contact_email', 'like', "%{$term}%");
        });
    }

    /**
     * Human-friendly label for service category.
     */
    public function getServiceCategoryLabelAttribute(): string
    {
        return match ($this->service_category) {
            self::CATEGORY_SOFTWARE => 'Dedicated Software Engineering',
            self::CATEGORY_BPO => '24/7 BPO & Customer Success',
            self::CATEGORY_FINANCE => 'Finance & Back-Office Operations',
            self::CATEGORY_MARKETING => 'Growth & Digital Operations',
            default => ucwords(str_replace('_', ' ', $this->service_category ?? 'General Outsourcing')),
        };
    }

    /**
     * Status badge Tailwind styles.
     */
    public function getStatusBadgeClassAttribute(): string
    {
        return match ($this->status) {
            self::STATUS_NEW => 'bg-blue-500/10 text-blue-400 border-blue-500/30',
            self::STATUS_CONTACTED => 'bg-amber-500/10 text-amber-400 border-amber-500/30',
            self::STATUS_QUALIFIED => 'bg-purple-500/10 text-purple-400 border-purple-500/30',
            self::STATUS_PROPOSAL_SENT => 'bg-indigo-500/10 text-indigo-400 border-indigo-500/30',
            self::STATUS_WON => 'bg-emerald-500/10 text-emerald-400 border-emerald-500/30',
            self::STATUS_LOST => 'bg-rose-500/10 text-rose-400 border-rose-500/30',
            default => 'bg-slate-500/10 text-slate-400 border-slate-500/30',
        };
    }

    /**
     * Human-friendly status label.
     */
    public function getStatusLabelAttribute(): string
    {
        return match ($this->status) {
            self::STATUS_NEW => 'New Inbound',
            self::STATUS_CONTACTED => 'Contacted',
            self::STATUS_QUALIFIED => 'Qualified',
            self::STATUS_PROPOSAL_SENT => 'Proposal Sent',
            self::STATUS_WON => 'Closed Won',
            self::STATUS_LOST => 'Closed Lost',
            default => ucfirst($this->status),
        };
    }
}
