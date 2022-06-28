<?php

declare(strict_types=1);

namespace RdssExample\Models;

use Doctrine\ORM\Mapping as ORM;

//phpcs:disable
/**
 * Logging Table for import/export failures
 *
 * @ORM\Entity
 * @ORM\Table(
 *     name="rdsss_example_table",
 *     indexes={
 *         @ORM\Index(name="example_idx", columns={"foo", "bar"}),
 *         @ORM\Index(name="last_error_at_idx", columns={"lastErrorAt"})
 *     },
 *     uniqueConstraints={@ORM\UniqueConstraint(name="foobar_unique_idx",columns={"foo", "bar"})}
 * )
 */
//phpcs:enable
class Model
{
    private int $foo;

    private string $bar;

    public function getFoo(): int
    {
        return $this->foo;
    }

    /**
     * Foo setter
     *
     * @return Model
     */
    public function setFoo(int $foo): self
    {
        $this->foo = $foo;
        return $this;
    }

    public function getBar(): string
    {
        return $this->bar;
    }

    /**
     * Bar setter
     *
     * @return Model
     */
    public function setBar(string $bar): self
    {
        $this->bar = $bar;
        return $this;
    }
}
