<?php

namespace Ft6k\Bundle\WpDoctrineBundle\User;

use Phpass\PasswordHash;


/**
 * @author  Kyle Tucker <kyleatucker@gmail.com>
 */
class PasswordManager
{
    /** @var  PasswordHash */
    protected $phpass;

    /**
     * @param PasswordHash $phpass
     */
    public function __construct(PasswordHash $phpass)
    {
        $this->phpass = $phpass;
    }

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * Encode a raw password.
     * 
     * @param   string  $raw
     * @return  string
     */
    public function hashPassword($raw)
    {
        return $this->phpass->HashPassword($raw);
    }

    /**
     * Check a raw password against a hash.
     * 
     * @param   string  $hashed
     * @param   string  $raw
     * @return  bool
     */
    public function passwordMatches($hashed, $raw)
    {
        return $this->phpass->CheckPassword($raw, $hashed);
    }
}
