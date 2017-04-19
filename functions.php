<?php
/**
 * @author : Andrew Dichabeng
 */

/* sample data from the device */
$deviceData = array("0x10D2D5", "0xA6D510", "0x010101", "0xFFFFFF", "0x000000", "0xAAAAAA");

/**
 * Function to format the raw device data and make it ready for conversion.
 * @param $data - A single Hexidecimal string of raw device data. (Format : "0x000000" with length = 8)
 * @return array - Returns an array of formatted data. (Format : {[0] => "000000AB", [1] => "FFFFFFAB", [2] => "FFFFFFAB"})
 * NOTE : The returned array stores the x,y and z components as {[0] => x, [1] => y, [2] => z}
 */
function formatDeviceData($data) {
    $x = substr($data, 2, 2);
    $y = substr($data, 4, 2);
    $z = substr($data, 6, 2);

    /**
     * NOTE : The padding format assumes the sign convention from the device's orientation.
     *        Therefore all x-coordinate values to be positive (padded with "000000")
     *                      y-coordinate values to be negative (padded with "FFFFFF")
     *                      x-coordinate values to be negative (padded with "FFFFFF")
     */

    $x = "000000" . $x;
    $y = "FFFFFF" . $y;
    $z = "FFFFFF" . $z;

    return array($x, $y, $z);
}

/**
 * Function to convert a Hexidecimal(HEX32) string to a 32-bit signed integer(INT32).
 * @param $data -   An array of the formatted device data.
 * @return array - Returns an array of the converted device data as 32-bit signed integers.
 * Credit :
 *  -   user hsz on stackoverflow for conversion line.
 *      Link : https://stackoverflow.com/questions/12368811/how-to-convert-a-hexadecimal-value-into-a-signed-integer-in-php
 */
function convertHex2Dec($data) {
    $xHex = $data[0];
    $yHex = $data[1];
    $zHex = $data[2];

    $xDec = reset(unpack("l", pack("l", hexdec($xHex))));
    $yDec = reset(unpack("l", pack("l", hexdec($yHex))));
    $zDec = reset(unpack("l", pack("l", hexdec($zHex))));

    return array($xDec, $yDec, $zDec);
}

/**
 * Function to add row data for each element of device data.
 * @param $data - The data element to be processed and added to the table.
 * @param $index -   The index of device data element to be processed.
 */
function addRow($data, $index) {
    $run = $index + 1;
    $formattedData = formatDeviceData($data);
    $convertedData = convertHex2Dec($formattedData);
    $output = "<tr><td class=\"col-xs-1 text-center\">$run</td>";
    $output .= "<td class=\"col-xs-1 text-center\">$data</td>";
    $output .= "<td class=\"col-xs-1 text-center\">$formattedData[0]</td>";
    $output .= "<td class=\"col-xs-1 text-center\">$formattedData[1]</td>";
    $output .= "<td class=\"col-xs-1 text-center\">$formattedData[2]</td>";
    $output .= "<td class=\"col-xs-1 text-center\">$convertedData[0]</td>";
    $output .= "<td class=\"col-xs-1 text-center\">$convertedData[1]</td>";
    $output .= "<td class=\"col-xs-1 text-center\">$convertedData[2]</td>";
    $output .= "</tr>";
    echo $output;
}