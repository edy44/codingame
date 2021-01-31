<?php

namespace CodinGame\Easy\ChuckNorris;

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
        $binaryString = $this->convertStringToBinary($message);
        $explode = $this->explodeBinaryData($binaryString);

        return $this->encodeWithChuckNorrisRules($explode);
    }

    /**
     * @param string $word
     * @return string
     */
    private function convertStringToBinary(string $word): string
    {
        $characters = str_split($word);

        $binary = [];
        foreach ($characters as $character) {
            $data = unpack('H*', $character);
            $convertToBinary = base_convert($data[1], 16, 2);
            $length = strlen($convertToBinary);
            $prefix = '';
            while ($length < 7) {
                $prefix .= '0';
                $length++;
            }
            $binary[] = $prefix . $convertToBinary;
        }

        return implode('', $binary);
    }

    /**
     * @param string $binaryData
     * @return array[]
     */
    private function explodeBinaryData(string $binaryData): array
    {
        $results = [];
        $key = 0;
        $position = 0;

        while ($position < strlen($binaryData)) {
            $length = 1;

            while (isset($binaryData[$position+1]) && $binaryData[$position] === $binaryData[$position+1]) {
                $length++;
                $position++;
            }

            $results[$key]['length'] = $length;
            $results[$key]['value'] = $binaryData[$position];
            $key++;

            $position++;
        }

        return $results;
    }

    /**
     * @param array $results
     * @return string
     */
    private function encodeWithChuckNorrisRules(array $results): string
    {
        $code = '';

        foreach ($results as $result) {
            $value = $result['value'];
            $count = $result['length'];

            if ($value === '0') {
                $code .= '00 ';
            }
            if ($value === '1') {
                $code .= '0 ';
            }

            while ($count !== 0) {
                $code .= '0';
                $count--;
            }

            $code .= ' ';
        }

        return trim($code);
    }
}
