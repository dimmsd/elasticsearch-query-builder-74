<?php

namespace Spatie\ElasticsearchQueryBuilder\Queries;

class RangeQuery implements Query
{
    protected string $field;

    /**
     * @var int | float
     */
    protected $gte;

    /**
     * @var int | float
     */
    protected $lt;

    /**
     * @var int | float
     */
    protected $lte;

    /**
     * @var int | float
     */
    protected $gt;

    public static function create(string $field): self
    {
        return new self($field);
    }

    public function __construct(string $field)
    {
        $this->field = $field;
    }

    public function lt($value): self
    {
        $this->lt = $value;

        return $this;
    }

    public function lte($value): self
    {
        $this->lte = $value;

        return $this;
    }

    public function gt($value): self
    {
        $this->gt = $value;

        return $this;
    }

    public function gte($value): self
    {
        $this->gte = $value;

        return $this;
    }

    public function toArray(): array
    {
        $parameters = [];

        if ($this->lt !== null) {
            $parameters['lt'] = $this->lt;
        }

        if ($this->lte !== null) {
            $parameters['lte'] = $this->lte;
        }

        if ($this->gt !== null) {
            $parameters['gt'] = $this->gt;
        }

        if ($this->gte !== null) {
            $parameters['gte'] = $this->gte;
        }

        return [
            'range' => [
                $this->field => $parameters,
            ],
        ];
    }
}
