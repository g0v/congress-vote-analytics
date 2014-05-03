<?php
class Helper
{

    /**
     * Method static shortString short the long string
     *
     * @param string $input_string # the string to short
     * @param int    $max_num      # set the max length num
     *
     * @return string $output
     */
    public static function shortString($input_string, $max_num)
    {

        mb_internal_encoding("UTF-8");

        $asciiLength = $max_num*2;
        $mbLength    = $max_num*3;

        $len  = strlen($input_string);

        if (mb_check_encoding($input_string, 'ASCII')) {

            $input_string = substr($input_string, 0, $asciiLength);

        } else {

            $input_string = substr($input_string, 0, $mbLength);

        }// end if

        $check_utf8 = mb_check_encoding(
            mb_substr(
                $input_string,
                mb_strlen($input_string)-2,
                mb_strlen($input_string)-1
            ),
            'UTF-8'
        );

        if (!$check_utf8) {

            $input_string
                = mb_substr($input_string, 0, mb_strlen($input_string)-1);

        }// end if

        if (mb_check_encoding($input_string, 'ASCII')) {

            if ($len > $asciiLength) {

                $input_string = $input_string."...";

            }// end if

        } else {

            if ($len > $mbLength) {

                $input_string = $input_string."...";

            }// end if

        }// end if

        return $input_string;

    }// end function shortString

}
?>