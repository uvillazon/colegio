<?php
namespace Sistema\ColegioBundle\DoctrineExtensions\DBAL\Types;

/**
 * Created by PhpStorm.
 * User: UB
 * Date: 07/09/2016
 * Time: 23:15
 */
use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\ConversionException;
use Doctrine\DBAL\Types\DateTimeType;

class UTCDateTimeType extends DateTimeType
{
    /** @var \DateTimeZone */
    static private $utc = null;
    /**
     * {@inheritDoc}
     */
    public function convertToDatabaseValue($value, AbstractPlatform $platform)
    {
        if ($value === null) {
            return null;
        }
        if (!$value instanceof \DateTime) {
            return null;
        }
        $value->setTimezone((self::$utc) ? self::$utc : (self::$utc = new \DateTimeZone('UTC')));
        return $value->format($platform->getDateTimeFormatString());
    }
    /**
     * {@inheritDoc}
     */
    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
        if ($value === null) {
            return null;
        }
        $val = \DateTime::createFromFormat(
            $platform->getDateTimeFormatString(),
            $value,
            (self::$utc) ? self::$utc : (self::$utc = new \DateTimeZone('UTC'))
        );
        if (!$val) {
            throw ConversionException::conversionFailed($value, $this->getName());
        }
        return $val;
    }
}