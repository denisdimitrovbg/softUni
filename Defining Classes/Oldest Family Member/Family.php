<?php


class Family
{
    /**
     * @var Person []
     */
    private $family;

    /**
     * Family constructor.
     * @param Person[] $family
     */
    public function __construct(array $family=null)
    {
        $this->family = [];
    }


    public function addMember(Person $member): void
    {
        $this->family[] = $member;
    }

    public function getOldestMember(): Person
    {
        $oldestMember = new stdClass();
        $maxAge = 0;

        foreach ($this->family as $member) {
            if ($member->getAge() > $maxAge) {
                $oldestMember = $member;
                $maxAge = $member->getAge();
            }

        }
        return $oldestMember;
    }

}