<?php

namespace App\Database;

class DbConnexion
{
    private DbConfiguration $_configuration;

    /**
     * Constructor
     * 
     * @param DbConfiguration $config -
     */
    public function __construct(DbConfiguration $config)
    {
        $this->_configuration = $config;
    }
    /**
     * Get Dsn
     * 
     * @return string
     */
    public function dsn(): string
    {
        // this is just for the sake of demonstration, not a real DSN
        // notice that only the injected config is used here, so there is
        // a real separation of concerns here
        return sprintf(
            '%s:host=%s;dbname=%s;port=%d;charset=%s',
            $this->_configuration->getDriver(),
            $this->_configuration->getHost(),
            $this->_configuration->getDatabase(),
            $this->_configuration->getPort(),
            $this->_configuration->getCharset()
        );
    }
    /**
     * Get Username
     * 
     * @return string
     */
    public function username(): ?string
    {
        return sprintf('%s', $this->_configuration->getUsername());
    }
    /**
     * Get Password
     * 
     * @return string
     */
    public function password(): ?string
    {
        return sprintf('%s', $this->_configuration->getPassword());
    }
}
