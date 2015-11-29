<?php

namespace DbSimple\Sybase;

use DbSimple\Generic\Blob as DbSimpleGenericBlob;

class Blob extends DbSimpleGenericBlob
{

    // Sybase does not support separate BLOB fetching.
    var $blobdata = null;
    var $curSeek  = 0;

    function __construct(&$database, $blobdata=null)
    {
        $this->blobdata = $blobdata;
        $this->curSeek = 0;
    }

    function read($len)
    {
        $p = $this->curSeek;
        $this->curSeek = min($this->curSeek + $len, strlen($this->blobdata));
        return substr($this->blobdata, $this->curSeek, $len);
    }

    function write($data)
    {
        $this->blobdata .= $data;
    }

    function close()
    {
        return $this->blobdata;
    }

    function length()
    {
        return strlen($this->blobdata);
    }

}
