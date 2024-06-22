<?php

/*
 * By adding type hints and enabling strict type checking, code can become
 * easier to read, self-documenting and reduce the number of potential bugs.
 * By default, type declarations are non-strict, which means they will attempt
 * to change the original type to match the type specified by the
 * type-declaration.
 *
 * In other words, if you pass a string to a function requiring a float,
 * it will attempt to convert the string value to a float.
 *
 * To enable strict mode, a single declare directive must be placed at the top
 * of the file.
 * This means that the strictness of typing is configured on a per-file basis.
 * This directive not only affects the type declarations of parameters, but also
 * a function's return type.
 *
 * For more info review the Concept on strict type checking in the PHP track
 * <link>.
 *
 * To disable strict typing, comment out the directive below.
 */

declare(strict_types=1);

class Tournament
{
    public function tally(string $scores): string
    {
        $teams = [];
        $lines = explode("\n", trim($scores));

        foreach ($lines as $line) {
            $parts = explode(";", $line); 
        
            if (count($parts) === 3) {
                [$team1, $team2, $outcome] = $parts;
        
                $this->updateTeam($teams, $team1, $outcome);
                $this->updateTeam($teams, $team2, $this->reverseOutcome($outcome));
            }
        }

        usort($teams, function ($a, $b) {
            return $b['P'] <=> $a['P'] ?: strcmp($a['Team'], $b['Team']);
        });

        return $this->formatTable($teams);
    }

    private function updateTeam(array &$teams, string $team, string $outcome): void
    {
        if (!isset($teams[$team])) {
            $teams[$team] = ['Team' => $team, 'MP' => 0, 'W' => 0, 'D' => 0, 'L' => 0, 'P' => 0];
        }

        $teams[$team]['MP']++;
        if ($outcome === 'win') {
            $teams[$team]['W']++;
            $teams[$team]['P'] += 3;
        } elseif ($outcome === 'draw') {
            $teams[$team]['D']++;
            $teams[$team]['P']++;
        } else {
            $teams[$team]['L']++;
        }
    }

    private function reverseOutcome(string $outcome): string
    {
        return match ($outcome) {
            'win' => 'loss',
            'loss' => 'win',
            default => 'draw',
        };
    }

    private function formatTable(array $teams): string
    {
        $header = 'Team                           | MP |  W |  D |  L |  P';
        $rows = array_map(function ($team) {
            return sprintf("%-31s| %2d | %2d | %2d | %2d | %2d", ...array_values($team));
        }, $teams);
        return implode("\n", array_merge([$header], $rows));
    }
}
