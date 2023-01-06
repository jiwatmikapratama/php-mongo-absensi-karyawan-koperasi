<?php


class redisDB extends Redis
{

    private $hostRedis = '127.0.0.1';
    private $port = 6379;
    private $ttl = 604800; /* time to live = 1 minggu */
    private $db = 0; /* db redis */

    /* Koneksi ke redis */

    public function openRedis()
    {
        $this->connect($this->hostRedis, $this->port);
        try {
            $pingRedis = $this->ping();
        } catch (Throwable $e) {
            $e->getMessage();
        }

        if (isset($e)) {
            return false;
        } else {
            return true;
        }
    }

    /* tutup koneksi */

    public function closeRedis()
    {
        $this->close();
    }

    public function InsertDataToKey($keyredis, $value)
    {
        try {
            $check = $this->openRedis();
            if ($check != false) {
                $this->SELECT($this->db);
                $this->setex($keyredis, $this->ttl, $value);
                $this->closeRedis();
                return true;
            } else {
                return false;
            }
        } catch (Throwable $e) {
            throw $e;
            return false;
        }
    }


}
