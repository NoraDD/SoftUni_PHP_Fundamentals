<?php

class Song
{
    private $artist;
    private $songName;
    private $songLength;
    private $songMinutes;
    private $songSeconds;

    public function __construct(string $artist, string $songName, string $length)
    {
        $this->setArtist($artist);
        $this->setName($songName);
        $this->setLength($length);
    }

    private function setArtist($artist)
    {
        $stringSize = strlen($artist);
        if ($stringSize <= 20 && $stringSize >= 3) {
            $this->artist = $artist;
        } else {
            throw  new Exception('Artist name should be between 3 and 20 symbols.' . PHP_EOL);
        }
    }

    private function setName($songName)
    {
        $stringSize = strlen($songName);
        if ($stringSize <= 30 && $stringSize >= 3) {
            $this->songName = $songName;
        } else {
            throw  new Exception('Song name should be between 3 and 30 symbols.' . PHP_EOL);
        }
    }

    private function setLength($length)
    {
        $lengthArr = explode(':', $length);
        if (count($lengthArr) == 2) {
            $this->songLength = $lengthArr;
            list($minutes, $seconds) = $lengthArr;
            $secMin = $seconds + (60 * $minutes);
            if ($secMin >= 0 && $secMin <= 900) {
                $this->setMinutes($minutes);
                $this->setSeconds($seconds);
            } else {
                throw  new Exception('Invalid song length.' . PHP_EOL);
            }
        } else {
            throw  new Exception('Invalid song length.' . PHP_EOL);
        }
    }

    private function setMinutes($minutes)
    {
        if ($minutes >= 0 && $minutes <= 14) {
            $this->songMinutes = $minutes;
        } else {
            throw new Exception('Song minutes should be between 0 and 14.' . PHP_EOL);
        }
    }

    private function setSeconds($seconds)
    {
        if ($seconds >= 0 && $seconds <= 59) {
            $this->songSeconds = $seconds;
        } else {
            throw new Exception('Song seconds should be between 0 and 59.' . PHP_EOL);
        }
    }

    public function getMinutes()
    {
        return $this->songMinutes;
    }

    public function getSeconds()
    {
        return $this->songSeconds;
    }
}

class Playlist
{
    private $songs = [];
    private $totalMinutes;
    private $totalSeconds;

    public function addSong(Song $song)
    {
        $this->songs[] = $song;
        $this->totalMinutes += $song->getMinutes();
        $this->totalSeconds += $song->getSeconds();
        echo 'Song added.' . PHP_EOL;
    }

    public function getSongsCount()
    {
        return count($this->songs);
    }

    public function __toString()
    {
        $seconds = $this->totalSeconds % 60;
        $minutesToHours = $this->totalMinutes + ($this->totalSeconds / 60);
        $minutes = floor($this->totalMinutes + ($this->totalSeconds / 60)) % 60;
        $hours = floor($minutesToHours / 60);
        $format = ('%01dh %02dm %02ds');
        $print = sprintf($format, $hours, $minutes, $seconds);
        return "Songs added: " . $this->getSongsCount() . PHP_EOL . "Playlist length: " . $print;
    }
}

$songsCount = trim(fgets(STDIN));
$playlist = new Playlist();
for ($i = 0; $i < $songsCount; $i++) {
    try {
        $songAttributes = explode(';', trim(fgets(STDIN)));
        if (count($songAttributes) == 3) {
            $artist = $songAttributes[0];
            $songName = $songAttributes[1];
            $length = $songAttributes[2];
            $playlist->addSong(new Song($artist, $songName, $length));
        } else {
            throw new Exception('Invalid song.' . PHP_EOL);
        }
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}
echo $playlist;