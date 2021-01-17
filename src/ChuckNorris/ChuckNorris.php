<?php

namespace CodinGame\ChuckNorris;

/**
 * Class ChuckNorris
 * @package CodinGame\ChuckNorris
 */
class ChuckNorris
{
    /**
     * @param string $message
     * @return string
     */
    public function convertStringToChuckNorris(string $message): string
    {
        $words = explode(' ', $message);
        $results = [];

        foreach ($words as $word) {
            $binaryString = $this->convertStringToBinary($word);

            $explode = $this->explode($binaryString);

            $results[] = $this->encodeWithChuckNorrisStyle($explode);
        }

        return implode(' ', $results);
    }

    /**
     * @param string $message
     * @return string
     */
    private function convertStringToBinary(string $message): string
    {
        $characters = str_split($message);

        $binary = [];
        foreach ($characters as $character) {
            $data = unpack('H*', $character);
            $binary[] = base_convert($data[1], 16, 2);
        }

        return implode('', $binary);
    }

    /**
     * @param string $binaryData
     * @return array[]
     */
    private function explode(string $binaryData): array
    {
        $lengths = [];
        $values = [];

        $position = 0;

        while ($position < strlen($binaryData)) {
            $length = 1;

            if (!isset($binaryData[$position+1])) {
                break;
            }

            while ($binaryData[$position] === $binaryData[$position+1]) {
                $length++;
                $position++;

                if (!isset($binaryData[$position+1])) {
                    break;
                }
            }

            $lengths[] = $length;
            $values[] =  $binaryData[$position];

            $position++;
        }

        return [
            'lengths' => $lengths,
            'values' => $values
        ];
    }

    /**
     * @param array $data
     * @return string
     */
    private function encodeWithChuckNorrisStyle(array $data): string
    {
        $result = '';

        foreach ($data['values'] as $index => $value) {
            if ($value === '0') {
                $result .= '00 ';
            }
            if ($value === '1') {
                $result .= '0 ';
            }

            $count = $data['lengths'][$index];
            while ($count !== 0) {
                $result .= '0';
                $count--;
            }

            $result .= ' ';
        }

        return trim($result);
    }
}
