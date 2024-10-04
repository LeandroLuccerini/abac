<?php

declare(strict_types=1);

namespace Szopen\Abac\Request;

use Exception;
use InvalidArgumentException;

abstract class AttributesAware
{
    /**
     * @var Attribute[]
     */
    private array $attributes = [];

    /**
     * @param Attribute[] $attributes
     */
    public function __construct(array $attributes)
    {
        if (empty($attributes)) {
            throw new InvalidArgumentException("Attributes must not be empty");
        }

        foreach ($attributes as $attribute) {
            if (!$attribute instanceof Attribute) {
                throw new InvalidArgumentException("Attributes must be all instance of Attribute");
            }

            $this->attributes[$attribute->attributeId] = $attribute;
        }
    }

    /**
     * @throws Exception
     */
    public function getAttributeById(string $attributeId): Attribute
    {
        if (!array_key_exists($attributeId, $this->attributes)) {
            throw new Exception(sprintf("Attribute %s not found ", $attributeId));
        }

        return $this->attributes[$attributeId];
    }
}