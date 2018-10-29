<?php

class avatar
{

    /*
     * PROPRIETES
     */

    private $avatar = null;
    private $slug_avatar = null;
    private $supprime = null;

    /*
     * CONSTRUCTEUR
     */

    public function __construct($a = array())
    {

        (isset($a['avatar'])) ? $this->setAvatar($a['avatar']) : null;
        (isset($a['slug_avatar'])) ? $this->setSlugavatar($a['slug_avatar']) : null;
        (isset($a['supprime'])) ? $this->setSupprime($a['supprime']) : null;
    }

    /*
     * SETTERS
     */

    public function setAvatar($v)
    {
        $this->avatar = $this->isAlpha($v) ? $v : null;
    }
    public function setSlugavatar($v)
    {
        $this->slug_avatar = $this->isAlpha($v) ? $v : null;
    }
    public function setSupprime($v)
    {
        $this->supprime = $this->isInteger($v) ? $v : null;
    }

    /*
     * GETTERS
     */

    public function getAvatar()
    {
        return $this->avatar;
    }
    public function getSlugavatar()
    {
        return $this->slug_avatar;
    }
    public function getSupprime()
    {
        return $this->supprime;
    }

    /*
     * DESTRUCTEUR
     */

    public function __destruct()
    {

    }

    /*
     * EXPRESSIONS REGULIERES
     */

    private function isInteger($val)
    {
        $regex = "/^[0-9]*$/";
        return preg_match($regex, $val);
    }

    private function isAlpha($val)
    {
        $regex = "/^[a-zA-Z\-\'\" 0-9]*$/";
        return preg_match($regex, $val);
    }
}
