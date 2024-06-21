<?php

class HighSchoolSweetheart
{
    public function firstLetter(string $name): string
    {
        return trim($name)[0];
    }

    public function initial(string $name): string
    {
        return strtoupper($this->firstLetter($name)).'.';
    }

    public function initials(string $name): string
    {
        return $this->initial(explode(' ', $name)[0]).' '.$this->initial(explode(' ', $name)[1]);
    }

    public function pair(string $sweetheart_a, string $sweetheart_b): string
    {

        $sweetheart_a = $this->initials($sweetheart_a);
        $sweetheart_b = $this->initials($sweetheart_b);

        return 
        <<<HEART
        ******       ******
      **      **   **      **
    **         ** **         **
   **            *            **
   **                         **
   **     $sweetheart_a  +  $sweetheart_b     **
    **                       **
      **                   **
        **               **
          **           **
            **       **
              **   **
                ***
                 *
   HEART;
    }
}
