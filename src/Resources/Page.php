<?php


namespace Genetsis\Druid\Rest\Resources;


class Page
{
    /**
     * @var int $size
     */
    protected $size;

    /**
     * @var int $totalElements
     */
    protected $totalElements;

    /**
     * @var int $totalPages
     */
    protected $totalPages;

    /**
     * @var int $number
     */
    protected $number;

    /**
     * @return int
     */
    public function getSize(): int
    {
        return $this->size;
    }

    /**
     * @param int $size
     * @return Page
     */
    public function setSize(int $size): Page
    {
        $this->size = $size;
        return $this;
    }

    /**
     * @return int
     */
    public function getTotalElements(): int
    {
        return $this->totalElements;
    }

    /**
     * @param int $totalElements
     * @return Page
     */
    public function setTotalElements(int $totalElements): Page
    {
        $this->totalElements = $totalElements;
        return $this;
    }

    /**
     * @return int
     */
    public function getTotalPages(): int
    {
        return $this->totalPages;
    }

    /**
     * @param int $totalPages
     * @return Page
     */
    public function setTotalPages(int $totalPages): Page
    {
        $this->totalPages = $totalPages;
        return $this;
    }

    /**
     * @return int
     */
    public function getNumber(): int
    {
        return $this->number;
    }

    /**
     * @param int $number
     * @return Page
     */
    public function setNumber(int $number): Page
    {
        $this->number = $number;
        return $this;
    }


}