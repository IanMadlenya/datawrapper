<?php 

class DatawrapperPlugin_VisualizationLineChart extends DatawrapperPlugin_Visualization {
    public function getMeta(){
        $meta = array(
            "title" => __("Line Chart", $this->getName()),
            "id" => "line-chart",
            "version" => "1.3.1",
            "extends" => "raphael-chart",
            "dimensions" => 2,
            "order" => 40,
            "options" => $this->getOptions()
        );
        return $meta;
    }
    public function getOptions(){
        $id = $this->getName();
        $options = array(
            "direct-labeling" => array(
                "type" => "checkbox",
                "label" => __("Direct labeling", $id),
                "default" => false,
                "depends-on" => array(
                    "chart.min_series_num" => 2
                )
            ),
            "legend-position" => array(
                "type" => "radio",
                "label" => __("Legend position", $id),
                "default" => "right",
                "depends-on" => array(
                    "direct-labeling" => false,
                    "chart.min_series_num" => 2
                ),
                "options" => array(
                    array(
                        "value" => "right",
                        "label" => __("right", $id)
                    ),
                    array(
                        "value" => "top",
                        "label" => __("top", $id),
                    ),
                    array(
                        "value" => "inside",
                        "label" => __("inside", $id),
                    )
                )
            ),
            "fill-between" => array(
                "type" => "checkbox",
                "label" => __("Fill between lines", $id),
                "default" => false,
                "depends-on" => array(
                    "chart.min_series_num" => 2,
                    "chart.max_series_num" => 2
                )
            ),
            "smooth-lines" => array(
                "type" => "checkbox",
                "label" => __("Smooth lines", $id),
                "default" => false,
                "expert" => false
            ),
            "rotate-x-labels" => array(
                "type" => "checkbox",
                "label" => __("Rotate labels 45 degrees", $id),
                "default" => false
            ),
            "baseline-zero" => array(
                "type" => "checkbox",
                "label" => __("Force a baseline at zero", $id),
            ),
            "connect-missing-values" => array(
                "type" => "checkbox",
                "label" => __("Connect lines between missing values", $id),
                "label" => _("Force a baseline at zero"),
            ),
            "extend-range" => array(
                "type" => "checkbox",
                "label" => __("Extend y-range to nice axis ticks", $id)
            ),
            "force-banking" => array(
                "type" => "checkbox",
                "hidden" => true,
                "label" => __("Bank the lines to 45 degrees", $id)
            ),
            "show-grid" => array(
                "type" => "checkbox",
                "hidden" => true,
                "label" => __("Show grid", $id),
                "default" => false
            )
        );
        return $options;
    }
    public function getDemoDataSets(){
        $datasets = array();
        $datasets[] = array(
            'id' => 'youth-unemployment',
            'title' => __('Youth Unemployment in Europe'),
            'type' => __('Line chart'),
            'presets' => array(
                'type' => 'line-chart',
                'metadata.describe.source-name' => 'Eurostat',
                'metadata.describe.source-url' => 'http://appsso.eurostat.ec.europa.eu/nui/show.do?query=BOOKMARK_DS-055624_QID_91D6DBE_UID_-3F171EB0&layout=TIME,C,X,0;GEO,L,Y,0;S_ADJ,L,Z,0;AGE,L,Z,1;SEX,L,Z,2;INDICATORS,C,Z,3;&zSelection=DS-055624AGE,Y_LT25;DS-055624SEX,T;DS-055624S_ADJ,SA;DS-055624INDICATORS,OBS_FLAG;&rankName1=SEX_1_2_-1_2&rankName2=AGE_1_2_-1_2&rankName3=TIME_1_0_0_0&rankName4=S-ADJ_1_2_-1_2&rankName5=INDICATORS_1_2_-1_2&rankName6=GEO_1_2_0_1&sortR=ASC_361_FIRST&pprRK=FIRST&pprSO=PROTOCOL&ppcRK=FIRST&ppcSO=ASC&sortC=ASC_-1_FIRST&rStp=&cStp=&rDCh=&cDCh=&rDM=true&cDM=true&footnes=false&empty=false&wai=false&time_mode=NONE&lang=EN&cfo=%23%23%23%2C%23%23%23.%23%23%23',
                'metadata.data.vertical-header' => true,
                'metadata.data.transpose' => true
            ),
            'data' => "GEO/TIME 1983M01 1983M02 1983M03 1983M04 1983M05 1983M06 1983M07 1983M08 1983M09 1983M10 1983M11 1983M12 1984M01 1984M02 1984M03 1984M04 1984M05 1984M06 1984M07 1984M08 1984M09 1984M10 1984M11 1984M12 1985M01 1985M02 1985M03 1985M04 1985M05 1985M06 1985M07 1985M08 1985M09 1985M10 1985M11 1985M12 1986M01 1986M02 1986M03 1986M04 1986M05 1986M06 1986M07 1986M08 1986M09 1986M10 1986M11 1986M12 1987M01 1987M02 1987M03 1987M04 1987M05 1987M06 1987M07 1987M08 1987M09 1987M10 1987M11 1987M12 1988M01 1988M02 1988M03 1988M04 1988M05 1988M06 1988M07 1988M08 1988M09 1988M10 1988M11 1988M12 1989M01 1989M02 1989M03 1989M04 1989M05 1989M06 1989M07 1989M08 1989M09 1989M10 1989M11 1989M12 1990M01 1990M02 1990M03 1990M04 1990M05 1990M06 1990M07 1990M08 1990M09 1990M10 1990M11 1990M12 1991M01 1991M02 1991M03 1991M04 1991M05 1991M06 1991M07 1991M08 1991M09 1991M10 1991M11 1991M12 1992M01 1992M02 1992M03 1992M04 1992M05 1992M06 1992M07 1992M08 1992M09 1992M10 1992M11 1992M12 1993M01 1993M02 1993M03 1993M04 1993M05 1993M06 1993M07 1993M08 1993M09 1993M10 1993M11 1993M12 1994M01 1994M02 1994M03 1994M04 1994M05 1994M06 1994M07 1994M08 1994M09 1994M10 1994M11 1994M12 1995M01 1995M02 1995M03 1995M04 1995M05 1995M06 1995M07 1995M08 1995M09 1995M10 1995M11 1995M12 1996M01 1996M02 1996M03 1996M04 1996M05 1996M06 1996M07 1996M08 1996M09 1996M10 1996M11 1996M12 1997M01 1997M02 1997M03 1997M04 1997M05 1997M06 1997M07 1997M08 1997M09 1997M10 1997M11 1997M12 1998M01 1998M02 1998M03 1998M04 1998M05 1998M06 1998M07 1998M08 1998M09 1998M10 1998M11 1998M12 1999M01 1999M02 1999M03 1999M04 1999M05 1999M06 1999M07 1999M08 1999M09 1999M10 1999M11 1999M12 2000M01 2000M02 2000M03 2000M04 2000M05 2000M06 2000M07 2000M08 2000M09 2000M10 2000M11 2000M12 2001M01 2001M02 2001M03 2001M04 2001M05 2001M06 2001M07 2001M08 2001M09 2001M10 2001M11 2001M12 2002M01 2002M02 2002M03 2002M04 2002M05 2002M06 2002M07 2002M08 2002M09 2002M10 2002M11 2002M12 2003M01 2003M02 2003M03 2003M04 2003M05 2003M06 2003M07 2003M08 2003M09 2003M10 2003M11 2003M12 2004M01 2004M02 2004M03 2004M04 2004M05 2004M06 2004M07 2004M08 2004M09 2004M10 2004M11 2004M12 2005M01 2005M02 2005M03 2005M04 2005M05 2005M06 2005M07 2005M08 2005M09 2005M10 2005M11 2005M12 2006M01 2006M02 2006M03 2006M04 2006M05 2006M06 2006M07 2006M08 2006M09 2006M10 2006M11 2006M12 2007M01 2007M02 2007M03 2007M04 2007M05 2007M06 2007M07 2007M08 2007M09 2007M10 2007M11 2007M12 2008M01 2008M02 2008M03 2008M04 2008M05 2008M06 2008M07 2008M08 2008M09 2008M10 2008M11 2008M12 2009M01 2009M02 2009M03 2009M04 2009M05 2009M06 2009M07 2009M08 2009M09 2009M10 2009M11 2009M12 2010M01 2010M02 2010M03 2010M04 2010M05 2010M06 2010M07 2010M08 2010M09 2010M10 2010M11 2010M12 2011M01 2011M02 2011M03 2011M04 2011M05 2011M06 2011M07 2011M08 2011M09 2011M10 2011M11 2011M12 2012M01 2012M02 2012M03 2012M04 2012M05 2012M06 2012M07 2012M08 2012M09 2012M10 2012M11 2012M12 2013M01 2013M02 2013M03
Greece  :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   29,9    29,8    30,0    30,4    30,7    30,9    30,1    31,0    30,6    30,5    30,6    30,6    31,8    31,7    31,7    31,5    31,4    31,3    32,1    32,1    31,7    29,9    29,8    29,8    29,7    29,5    29,4    29,3    29,2    29,1    27,9    27,9    27,8    28,2    28,0    27,8    28,4    28,2    28,1    27,8    27,7    27,6    28,3    28,1    28,0    27,9    27,8    27,7    26,9    26,8    26,7    26,6    26,6    26,5    26,1    26,1    26,1    26,1    26,0    25,9    26,6    26,5    26,5    27,7    27,5    27,4    27,5    27,4    27,3    28,6    28,3    28,0    27,2    26,6    26,5    26,1    25,5    25,8    26,1    26,3    26,3    25,8    25,2    24,7    25,0    25,4    26,2    26,2    26,5    26,8    26,9    26,9    26,1    24,8    25,1    24,9    25,1    24,8    24,8    24,8    24,5    24,9    25,0    25,8    27,2    25,0    24,3    24,0    23,3    22,8    22,3    22,4    22,8    22,7    22,5    21,8    21,7    21,7    22,6    23,1    22,0    21,2    21,2    21,8    21,8    22,2    21,9    22,9    23,9    25,0    25,0    24,8    25,2    25,0    24,6    24,6    25,3    26,5    27,3    27,9    28,8    29,6    30,3    30,5    31,2    32,3    31,9    32,6    32,6    33,9    34,9    36,3    37,2    37,5    39,5    40,7    44,2    42,6    43,6    44,3    45,8    46,7    47,4    50,1    51,3    52,1    52,5    52,3    53,1    54,0    55,4    56,1    57,0    58,0    56,3    58,8    58,4    59,1    :   :
Spain   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   44,6    44,4    44,1    43,5    43,3    43,4    43,4    43,6    43,5    42,5    42,4    42,3    40,8    40,8    40,6    40,4    40,1    40,1    39,7    39,4    39,3    39,2    39,0    38,7    38,9    38,8    38,7    36,8    36,4    35,9    35,8    35,5    35,1    34,9    34,4    33,8    33,4    32,7    32,3    31,7    31,7    31,2    31,7    31,8    32,1    31,4    31,4    31,0    30,6    30,5    30,4    30,4    30,7    30,3    29,9    29,6    29,5    28,9    28,9    28,8    29,0    29,0    28,9    29,0    29,1    29,2    29,6    29,4    29,4    29,2    29,3    29,9    31,4    31,6    31,6    32,2    32,2    32,9    35,0    35,6    36,2    37,7    38,0    38,9    39,7    39,9    40,8    41,9    42,0    42,4    42,1    42,0    42,3    43,1    43,1    43,0    43,1    43,1    42,8    42,4    42,4    42,1    41,6    41,9    42,6    40,0    40,7    40,5    39,5    39,6    39,3    39,2    39,3    39,4    39,1    39,1    38,6    39,2    39,2    39,2    38,8    38,7    38,5    38,3    38,0    37,7    37,3    36,9    36,5    36,3    36,2    35,8    35,7    35,4    35,2    34,8    34,3    34,1    33,8    33,4    33,3    33,0    32,7    32,7    32,4    32,2    31,8    31,4    31,1    30,5    30,2    29,7    29,3    28,4    27,9    27,4    27,0    26,6    26,2    25,8    25,5    25,1    24,7    24,6    24,5    24,4    24,0    23,5    23,1    22,9    22,7    22,7    22,6    22,5    22,5    22,1    21,5    20,2    21,3    21,1    20,8    21,6    21,3    21,1    21,1    20,9    20,8    20,8    21,0    21,2    21,9    21,5    21,9    22,1    22,2    22,4    22,3    22,5    22,7    22,7    22,8    22,8    22,8    22,9    22,6    22,4    22,7    22,7    22,7    22,8    22,8    22,7    22,6    22,5    22,2    21,9    22,4    22,2    22,3    22,2    22,2    22,1    21,6    21,4    21,2    21,2    21,2    20,9    20,5    20,1    19,6    19,1    18,7    18,6    18,8    18,7    18,6    18,2    18,0    18,1    18,0    17,9    17,6    17,6    17,6    17,6    18,1    18,1    17,9    17,6    17,4    17,4    17,6    17,5    18,2    18,3    18,6    18,6    18,7    19,2    19,8    20,4    20,8    21,0    22,4    23,3    24,1    24,4    24,9    25,9    28,2    29,9    31,6    33,4    34,8    36,1    36,6    37,1    37,7    39,0    39,7    40,1    39,9    39,5    39,7    39,8    40,1    40,5    41,0    41,3    41,5    41,6    41,9    42,2    42,8    43,3    43,6    43,9    44,4    44,9    44,9    45,2    45,9    46,7    47,2    47,9    48,3    48,9    49,5    50,2    50,9    51,3    51,9    52,6    52,9    53,6    54,1    54,5    55,1    55,2    55,3    55,4    55,7    :
Croatia :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   36,2    36,0    35,9    35,3    35,4    35,2    35,3    35,3    34,8    34,9    34,5    34,1    36,3    35,9    35,5    36,3    35,3    35,1    36,0    35,4    35,5    35,0    35,2    35,1    33,6    33,5    33,4    32,8    33,0    32,8    33,6    33,5    33,3    32,6    32,3    32,1    34,0    33,8    33,4    33,2    32,8    32,5    32,4    31,9    31,1    30,9    30,6    30,2    30,0    29,6    29,3    30,0    29,5    29,2    29,0    28,8    29,1    27,8    27,4    27,0    25,7    25,3    24,9    24,9    24,7    24,3    24,1    23,7    23,0    23,6    23,4    23,1    22,9    22,6    22,4    22,1    22,0    21,9    21,9    22,0    21,9    22,2    22,2    22,6    23,2    23,5    24,3    23,4    24,2    24,4    25,3    25,7    26,6    25,8    26,7    27,2    27,7    28,5    28,7    32,1    32,2    33,0    33,4    34,0    34,4    35,6    35,9    36,2    36,4    36,5    36,7    36,1    36,4    36,8    35,8    36,1    36,3    35,6    36,2    36,7    38,0    38,6    39,5    39,6    40,6    41,3    43,1    44,0    45,0    47,4    48,2    49,2    50,0    51,0    :
Portugal    17,4    17,6    17,9    18,3    18,7    19,2    19,8    20,1    20,1    20,2    20,3    20,4    20,5    20,4    20,4    20,7    20,8    21,1    21,3    21,3    21,3    21,3    21,2    21,0    20,8    20,8    20,9    20,9    20,9    20,7    20,9    21,2    21,6    21,7    21,8    21,6    21,6    21,4    21,4    21,1    20,8    20,3    19,5    19,1    18,9    18,9    18,7    18,4    18,0    17,9    17,7    17,6    17,2    16,7    15,9    15,6    15,4    15,0    14,8    14,6    14,6    14,5    14,4    14,4    14,1    13,5    13,0    12,7    12,4    12,2    12,1    12,2    12,3    12,2    12,0    11,8    11,5    11,7    11,9    11,8    11,6    11,6    11,6    11,5    11,3    11,1    11,0    10,7    10,9    11,3    10,8    10,7    10,5    10,2    9,9 9,7 9,6 9,4 9,0 8,8 9,0 9,2 9,5 9,6 9,5 9,6 9,6 9,5 9,6 9,7 9,8 10,0    10,1    10,1    10,0    10,1    10,2    10,4    10,6    11,0    11,3    11,6    12,1    12,1    12,2    12,2    12,7    13,0    13,3    13,4    13,5    13,7    13,9    14,1    14,2    14,4    14,6    14,6    14,5    14,5    14,8    15,2    15,6    15,7    15,8    15,9    16,1    16,3    16,3    16,1    16,0    15,8    16,0    16,2    16,3    16,4    16,4    16,6    16,9    17,1    17,2    17,0    16,7    16,5    16,2    16,1    16,1    16,1    16,0    16,0    15,4    15,0    14,7    14,5    14,5    14,4    14,4    14,3    13,9    13,1    14,2    13,8    13,0    12,4    12,0    11,9    12,2    12,4    12,7    12,9    12,6    12,3    11,9    11,6    11,6    11,9    11,9    11,6    10,8    10,2    9,6 9,3 9,6 10,2    11,2    11,6    11,4    10,6    10,3    10,2    10,4    10,4    10,2    9,8 9,8 10,0    10,6    11,1    11,6    11,7    11,7    11,7    11,2    10,9    11,3    11,9    12,3    12,4    12,4    12,4    12,8    13,4    13,8    14,2    14,6    15,0    15,4    15,8    16,2    16,3    16,4    16,6    17,0    17,4    17,6    17,8    17,9    17,9    18,7    18,9    19,0    18,8    18,3    18,3    18,6    18,3    18,6    19,0    19,5    19,7    20,0    19,2    18,8    18,7    18,7    19,1    19,4    20,1    20,5    20,5    20,3    20,3    20,4    20,0    19,6    19,1    18,8    18,8    18,9    19,4    19,9    20,0    20,2    20,6    20,7    20,9    21,3    21,6    21,7    21,7    21,5    20,9    20,1    19,8    19,7    19,7    19,6    19,8    19,8    19,8    19,8    19,8    19,2    18,9    19,1    19,6    20,3    20,9    21,3    19,6    22,1    22,7    23,4    24,0    24,6    25,1    25,0    24,4    23,4    23,3    24,3    25,7    26,6    27,1    27,6    27,1    27,1    26,9    27,0    27,3    28,3    29,1    28,8    27,8    27,3    27,0    26,8    27,1    27,6    28,3    29,2    29,1    29,5    30,2    31,3    33,0    34,2    34,8    34,6    34,8    35,7    36,9    37,7    39,0    39,4    39,6    39,0    38,7    38,3    38,0    38,3    38,2    :
Italy   23,8    24,4    25,1    25,0    25,1    25,5    25,6    25,7    25,9    26,3    26,8    27,0    27,4    27,3    27,0    27,2    27,0    26,7    26,8    26,7    26,9    27,0    26,9    27,3    28,2    28,5    28,4    28,2    28,4    28,6    28,8    28,9    28,9    29,1    29,4    29,5    29,2    29,1    29,2    29,3    29,2    29,3    29,1    29,3    29,5    29,4    29,6    29,8    29,9    29,8    29,8    31,6    32,6    32,1    30,4    30,3    30,3    30,2    30,0    30,1    29,9    29,8    29,9    30,0    29,9    29,8    29,0    29,0    28,8    29,0    29,1    28,9    29,5    29,5    29,3    29,2    29,3    29,4    29,0    28,7    28,3    28,0    27,8    27,4    26,9    26,7    26,4    26,6    26,9    27,2    26,8    26,6    26,8    27,1    27,2    27,3    25,5    25,4    25,2    24,9    24,8    24,7    25,3    25,4    25,8    26,5    26,7    26,3    26,3    26,7    26,7    26,3    26,1    26,1    27,3    27,9    27,4    25,5    25,3    25,3    26,2    26,4    26,9    28,2    28,3    28,2    28,3    28,2    28,3    29,7    29,7    29,8    28,8    28,8    28,8    29,0    28,9    28,9    28,6    28,6    28,6    30,2    30,1    30,2    30,4    30,3    30,4    30,3    30,2    30,2    30,6    30,5    30,5    30,0    30,0    30,1    29,4    29,4    29,5    31,4    31,4    31,4    30,2    30,1    30,1    30,4    30,4    30,5    30,2    30,2    30,3    31,1    31,0    31,0    29,6    29,6    29,6    29,8    29,8    29,8    29,8    29,7    29,7    30,1    30,0    30,0    29,2    29,2    29,1    30,5    30,4    30,4    29,9    29,9    29,8    29,1    29,0    28,9    27,7    27,7    27,6    28,4    28,3    28,2    27,6    27,5    27,5    27,7    27,6    27,5    27,2    27,1    27,0    25,8    25,7    25,6    24,6    24,6    24,5    24,1    24,0    23,8    24,3    24,2    24,2    23,5    23,5    23,5    23,3    23,3    23,2    23,2    23,1    23,0    23,2    23,1    23,1    22,7    22,7    22,7    24,3    24,2    24,2    24,9    24,8    24,7    23,4    23,4    23,3    22,1    22,2    22,2    23,0    23,1    23,0    24,0    23,8    24,0    22,9    22,9    23,3    23,6    24,4    23,5    24,2    24,3    24,3    23,8    23,6    23,6    24,5    24,3    24,1    23,9    22,6    23,3    23,1    23,9    22,2    22,1    22,2    20,8    20,3    20,7    20,9    20,6    20,7    20,2    20,9    19,0    19,6    19,6    19,5    20,1    19,9    20,9    20,1    21,4    20,2    21,6    20,5    20,9    20,4    20,3    21,0    22,3    22,1    22,3    22,3    22,2    23,5    22,6    23,7    23,5    24,6    24,6    24,4    25,1    26,0    25,9    26,6    26,8    26,2    26,6    27,2    28,1    26,6    29,4    28,2    27,4    26,7    27,5    27,9    28,3    27,9    28,5    28,5    27,6    27,8    27,4    27,8    27,8    28,6    29,3    30,5    30,4    31,8    31,8    32,3    33,9    35,2    34,7    35,3    34,3    35,0    34,4    36,1    36,3    37,4    37,1    38,6    37,8    :
Cyprus  :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   10,3    10,3    10,3    10,3    10,3    10,3    9,7 9,7 9,7 9,2 9,2 9,2 8,4 8,4 8,4 8,3 8,3 8,3 8,3 8,3 8,3 7,9 7,9 7,9 7,7 7,7 7,7 8,0 8,0 8,0 8,1 8,1 8,1 8,3 8,3 8,3 8,5 8,5 8,5 9,0 9,0 9,0 8,7 8,7 8,7 8,7 8,7 8,7 8,6 8,6 8,6 9,3 9,3 9,3 11,2    11,2    11,2    11,7    11,7    11,7    13,2    13,2    13,2    13,9    13,9    13,9    13,9    13,9    13,9    14,1    14,1    14,1    11,5    11,5    11,5    10,0    10,0    10,0    8,2 8,2 8,2 9,8 9,8 9,8 10,2    10,2    10,2    10,6    10,6    10,6    10,2    10,2    10,2    9,6 9,6 9,6 10,5    10,5    10,5    8,0 8,0 8,0 8,5 8,5 8,5 9,3 9,3 9,3 9,6 9,6 9,6 13,3    13,3    13,3    16,7    16,7    16,7    16,7    16,7    16,7    18,5    18,5    18,5    17,8    17,8    17,8    15,1    15,1    15,1    14,7    14,7    14,7    19,1    19,1    19,1    20,7    20,7    20,7    23,5    23,5    23,5    25,8    25,8    25,8    25,3    25,3    25,3    26,8    26,8    26,8    27,5    27,5    27,5    31,8    31,8    31,8    :   :   :
France  15,4    15,4    15,3    15,3    15,5    15,7    15,9    16,2    16,4    16,8    17,2    17,5    18,1    18,5    19,0    19,4    19,6    19,8    20,0    20,0    20,1    20,3    20,3    20,3    20,3    20,2    20,1    19,8    19,6    19,6    19,4    19,3    19,2    19,0    18,9    18,8    18,7    18,7    18,8    18,8    18,9    18,9    18,8    18,8    18,8    18,6    18,5    18,4    18,3    18,3    18,3    18,2    18,1    18,0    17,9    17,9    17,9    17,8    17,8    17,8    17,7    17,6    17,4    17,2    17,0    16,9    16,8    16,7    16,5    16,3    16,0    15,8    15,6    15,5    15,4    15,3    15,3    15,1    15,1    15,1    15,0    14,9    14,9    14,9    14,7    14,6    14,5    14,5    14,5    14,6    14,7    14,8    14,9    15,0    15,1    15,3    15,3    15,4    15,6    15,8    16,0    16,2    16,5    16,6    16,7    16,7    16,8    16,9    16,9    17,0    17,1    17,2    17,4    17,6    18,0    18,3    18,5    18,9    19,3    19,7    19,9    20,1    20,4    20,7    21,1    21,4    21,8    22,0    22,2    22,4    22,7    22,9    23,1    23,1    23,2    23,2    23,2    23,2    23,0    22,8    22,5    22,3    22,1    22,1    21,8    21,6    21,6    21,7    21,7    21,3    20,7    20,9    21,1    21,2    21,6    20,5    20,2    22,1    22,2    22,0    22,1    22,3    22,4    22,6    22,8    23,0    23,2    23,3    23,7    23,6    23,5    23,3    23,1    23,0    22,8    22,6    22,5    22,5    22,3    22,1    22,3    22,2    22,1    21,8    21,6    21,4    21,4    21,4    21,4    21,3    21,3    21,2    23,6    23,6    23,7    23,5    23,4    23,3    22,9    22,7    22,3    21,9    21,6    21,2    20,9    20,7    20,4    20,0    19,7    19,5    19,3    19,3    19,0    18,6    18,3    18,2    16,2    16,3    16,2    16,1    16,1    16,2    16,3    16,4    16,4    16,5    16,7    16,7    17,0    17,0    17,1    17,2    17,3    17,3    17,4    17,4    17,4    17,3    17,4    17,4    18,0    17,9    18,2    19,0    19,1    19,2    19,1    18,4    19,5    20,0    20,2    20,6    20,4    20,5    20,5    20,4    20,5    20,7    20,9    20,9    20,9    20,8    21,0    21,0    20,8    20,7    20,5    20,3    20,5    20,9    21,7    22,1    22,1    21,7    21,8    22,0    22,6    23,0    23,1    22,8    22,5    22,4    22,2    22,2    22,0    22,1    21,9    21,7    21,5    21,3    20,9    20,5    20,2    19,7    19,2    18,8    18,8    19,2    19,0    18,6    18,1    17,8    18,0    18,6    18,8    19,2    19,3    19,4    19,7    20,3    20,9    21,6    22,3    23,2    23,9    24,3    24,4    24,1    24,0    24,2    24,2    24,5    24,3    23,8    23,6    23,6    23,5    23,6    23,9    24,0    24,2    24,5    23,9    22,9    22,6    22,8    23,2    23,5    23,3    23,0    22,8    22,6    22,4    22,1    22,2    22,7    23,1    23,2    23,1    23,0    23,1    23,2    23,7    24,1    24,8    25,0    25,2    25,3    25,3    25,5    26,0    26,2    :
United Kingdom  20,0    20,0    20,1    20,5    20,0    19,8    19,7    19,5    19,7    19,5    19,5    19,4    19,3    19,2    19,2    19,0    19,0    18,8    18,7    18,6    18,7    18,6    18,6    18,5    18,3    18,3    18,1    18,0    18,1    18,0    18,0    18,0    18,0    18,0    18,0    18,0    18,0    18,1    18,1    18,2    18,1    18,0    17,9    17,7    17,5    17,4    17,2    16,9    16,7    16,3    16,1    15,9    15,6    15,4    15,1    14,8    14,7    14,5    14,2    14,0    13,7    13,4    13,2    12,9    12,7    12,4    12,1    11,9    11,5    11,1    11,0    10,7    10,6    10,4    10,3    10,1    9,9 9,8 9,9 9,7 9,7 9,8 9,8 9,8 9,9 10,0    9,9 10,0    10,1    10,1    10,3    10,5    10,7    11,0    11,4    11,8    12,0    12,4    12,9    13,3    13,6    13,6    14,0    14,3    14,6    14,7    14,9    15,0    15,3    15,3    15,3    15,6    15,8    16,6    16,7    16,8    16,8    17,1    17,1    17,2    17,4    17,5    17,6    17,5    17,4    17,6    17,5    17,5    17,4    17,4    17,4    17,3    16,8    16,7    16,6    16,6    16,6    16,6    16,6    16,5    16,4    15,9    15,8    15,7    15,7    15,7    15,7    15,6    15,5    15,4    15,1    15,0    15,0    15,0    14,8    14,9    15,0    15,0    15,1    15,0    14,9    14,8    14,7    14,8    14,9    14,9    14,9    14,6    14,4    14,2    14,0    14,0    13,9    14,1    13,9    13,6    13,3    13,0    13,0    12,9    12,9    12,9    13,0    12,9    13,0    12,9    13,1    13,1    13,1    13,3    13,2    13,3    13,2    13,0    12,9    12,9    13,0    13,0    12,8    12,4    12,0    12,1    12,1    12,5    12,3    12,4    12,6    12,6    12,3    11,8    11,7    11,9    12,1    12,1    12,0    11,9    11,9    11,6    11,4    11,2    11,4    11,6    11,6    11,7    11,8    12,1    12,2    12,2    11,9    12,0    11,9    12,0    11,8    12,0    12,0    12,0    11,9    12,2    12,2    12,2    12,5    12,7    12,4    12,4    12,2    12,7    12,5    12,4    11,9    11,7    11,7    11,8    11,7    11,8    11,7    11,6    11,8    12,2    12,2    12,3    12,1    12,3    12,4    12,6    12,6    12,2    12,2    12,7    12,7    12,4    12,4    12,5    13,4    13,5    13,8    13,5    13,4    13,4    13,7    14,0    14,1    14,0    14,2    14,4    14,3    13,8    14,0    14,1    14,5    14,4    14,6    14,7    14,6    14,3    14,5    14,4    14,1    13,9    13,6    13,5    13,6    13,7    14,1    13,9    14,5    14,6    15,2    15,4    15,7    16,2    16,3    16,5    17,0    18,0    18,7    19,1    19,0    19,4    19,7    19,8    19,9    19,4    19,3    19,3    19,7    20,0    19,9    19,6    19,4    19,1    18,9    18,4    19,2    20,1    20,2    20,2    20,3    20,0    19,5    19,9    20,5    21,0    21,6    21,9    22,1    22,1    22,0    22,0    22,0    21,8    21,7    21,3    21,1    20,9    20,5    20,6    20,2    20,3    20,6    21,0    20,7    :   :
Norway  :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   11,5    11,1    10,2    11,2    11,8    12,0    12,0    13,1    13,8    13,4    13,3    13,1    13,4    13,1    12,5    12,2    12,6    13,2    13,1    12,1    11,7    12,1    13,0    13,4    13,2    13,4    14,0    14,2    13,9    13,7    13,3    13,1    12,1    12,6    13,8    14,8    15,2    14,7    14,2    14,1    14,2    14,7    14,7    15,3    15,7    15,5    14,8    14,5    14,4    14,2    14,6    14,9    14,2    13,9    14,1    15,5    15,7    15,6    14,4    13,2    12,9    12,8    13,3    13,9    13,9    13,8    13,7    14,0    14,2    13,6    13,5    13,8    13,9    14,8    14,2    13,2    12,5    12,6    12,3    11,9    11,6    12,0    11,8    12,3    12,0    13,4    13,5    13,4    12,7    12,2    12,0    11,5    11,4    11,5    11,6    11,8    11,8    10,6    10,1    10,6    11,3    10,8    10,4    10,2    9,8 9,3 9,4 9,4 9,2 8,7 8,9 10,3    9,9 10,1    9,3 8,7 8,4 8,2 8,5 7,7 7,8 8,3 9,4 9,4 9,2 8,3 8,6 8,7 10,2    10,0    10,0    10,3    10,4    10,5    10,1    9,3 8,2 8,3 8,7 10,5    10,2    10,5    10,2    10,3    10,1    9,9 9,4 8,8 9,2 10,1    10,5    10,1    10,2    10,7    10,9    10,7    11,4    11,4    11,6    11,5    10,7    10,2    9,5 10,4    10,6    11,0    10,9    10,5    10,8    10,9    11,2    11,5    10,7    10,6    10,7    12,1    12,0    11,4    11,0    11,0    10,3    10,8    10,7    11,3    11,3    11,4    11,7    11,3    11,5    11,1    11,5    11,5    11,5    11,1    11,5    11,5    11,8    11,7    11,9    11,6    11,2    11,0    11,5    10,8    10,0    9,1 9,5 10,0    9,8 9,2 9,1 8,5 7,6 7,1 7,1 8,2 8,3 8,2 7,9 7,3 7,1 7,1 7,1 7,2 6,8 6,7 6,7 6,8 7,1 7,2 7,0 6,4 6,3 6,5 7,0 7,4 7,9 8,0 8,3 8,3 8,9 8,6 9,0 8,6 9,1 9,1 9,6 9,8 9,4 9,5 9,2 9,4 9,0 9,1 9,2 9,7 10,1    9,5 9,0 8,4 9,0 8,9 9,5 9,3 9,4 9,0 8,7 8,8 8,2 8,3 8,7 8,9 9,2 8,6 8,5 8,2 8,1 7,9 7,9 8,1 8,0 8,3 8,2 8,9 8,9 9,4 9,7 9,7 :   :   :
Austria :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   6,1 6,0 5,8 5,8 5,8 5,7 5,6 5,6 5,6 5,6 5,5 5,5 5,5 5,5 5,5 5,5 5,5 5,6 5,6 5,6 5,7 5,8 5,9 5,9 6,0 6,1 6,2 6,3 6,2 6,2 6,3 6,4 6,4 6,5 6,5 6,5 6,6 6,6 6,6 6,6 6,7 6,7 6,8 6,8 6,7 6,7 6,7 6,7 6,7 6,7 6,8 6,7 6,6 6,6 6,5 6,3 6,1 6,0 5,9 5,7 5,6 5,5 5,5 5,5 5,4 5,2 5,3 5,3 5,3 5,3 5,4 5,4 5,5 5,5 5,4 5,2 5,2 5,2 5,1 5,2 5,2 5,2 5,2 5,3 5,4 5,4 5,5 5,5 5,6 5,7 5,8 5,9 6,0 6,1 6,3 6,4 6,5 6,6 6,6 6,8 6,8 6,8 6,8 6,8 6,8 6,8 6,7 6,7 6,7 6,8 6,9 7,1 7,5 8,0 8,4 8,6 8,9 9,1 9,4 9,7 12,2    11,4    10,6    9,7 8,5 7,8 8,4 9,1 9,4 9,5 9,9 9,9 10,0    9,6 9,3 10,1    11,3    11,6    11,1    10,3    9,6 10,2    10,5    10,5    10,2    10,4    10,4    9,2 8,3 8,4 8,2 8,6 9,6 8,8 8,0 8,2 8,0 8,0 8,8 9,7 9,2 8,9 9,9 9,7 8,6 8,4 7,8 7,2 8,2 8,4 7,5 6,8 7,1 7,1 7,0 7,4 8,0 8,6 9,7 10,2    9,3 8,9 9,5 10,0    10,1    10,8    10,7    10,2    10,1    10,4    9,8 9,5 9,4 9,6 9,1 8,5 9,0 8,7 8,7 9,6 9,1 7,6 8,0 8,2 8,1 8,6 8,7 8,6 8,5 7,9 7,6 7,0 7,7 8,9 8,9 8,3 8,6 8,7 9,1 8,9 8,5 8,5 9,0 9,2 8,9 8,6 8,4 9,0 9,3 8,9 :
Germany :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   :   5,7 5,7 5,7 5,7 5,7 5,7 5,8 5,8 5,9 5,9 5,9 6,0 6,0 6,1 6,1 6,2 6,3 6,4 6,5 6,6 6,8 6,9 7,1 7,2 7,3 7,5 7,6 7,8 7,9 8,0 8,1 8,3 8,4 8,5 8,6 8,7 8,8 8,9 9,0 9,1 9,1 9,1 9,0 9,0 8,9 8,9 8,9 8,8 8,8 8,7 8,7 8,7 8,7 8,8 8,9 9,0 9,1 9,2 9,3 9,4 9,5 9,6 9,7 9,8 9,9 10,0    10,1    10,2    10,3    10,4    10,5    10,5    10,6    10,7    10,8    10,8    10,8    10,7    10,7    10,6    10,5    10,4    10,4    10,3    10,2    10,1    10,1    10,0    9,9 9,8 9,8 9,7 9,6 9,5 9,4 9,4 9,3 9,2 9,2 9,1 9,1 9,0 9,0 9,0 9,0 9,0 9,0 9,0 9,0 9,0 9,0 8,9 8,9 8,8 8,7 8,6 8,5 8,5 8,4 8,3 8,2 8,1 8,1 8,1 8,1 8,2 8,3 8,4 8,5 8,7 8,8 9,0 9,1 9,3 9,4 9,5 9,6 9,8 9,9 10,1    10,2    10,4    10,5    10,7    10,9    11,1    11,2    11,3    11,4    11,6    11,7    11,8    11,8    11,9    12,0    12,1    12,2    12,5    12,7    13,1    13,4    13,8    14,1    14,3    14,6    14,8    15,2    15,6    16,0    16,3    16,5    16,4    16,2    16,0    15,8    15,7    15,5    15,3    15,0    14,6    14,3    14,0    13,9    13,9    13,9    13,9    13,9    13,8    13,6    13,4    13,1    12,9    12,6    12,4    12,1    11,9    11,8    11,7    11,7    11,7    11,7    11,6    11,5    11,4    11,2    11,1    10,9    10,7    10,5    10,3    10,1    10,0    10,0    10,1    10,3    10,6    10,9    11,2    11,3    11,5    11,5    11,5    11,5    11,5    11,5    11,5    11,4    11,3    11,2    11,0    10,7    10,5    10,3    10,1    9,9 9,8 9,6 9,4 9,3 9,1 9,0 9,0 8,9 8,9 8,8 8,7 8,6 8,5 8,4 8,3 8,2 8,2 8,1 8,1 8,1 8,1 8,1 8,1 8,0 8,0 8,0 8,0 8,0 7,9 7,8 7,7 :
"
        );
        $datasets[] = array(
            'id' => 'us-trade',
            'title' => __('US Trade with United Kingdom'),
            'type' => __('Line chart'),
            'presets' => array(
                'type' => 'line-chart',
                'metadata.describe.source-name' => 'US Census Bureau',
                'metadata.describe.source-url' => 'http://www.census.gov/foreign-trade/balance/c4120.html',
                'metadata.data.vertical-header' => true,
                'metadata.describe.number-format' => 'n1',
                'metadata.describe.number-divisor' => '3',
                'metadata.describe.number-append' => ' Billion USD',
                'metadata.visualize.sort-values' => false,
                'metadata.data.transpose' => false
            ),
            'data' => " Imports Exports
1985    31965.608   24123.792
1986    32331.39    23978.43
1987    35202.636   28651.014
1988    35054.175   35810.58
1989    34073.526   38756.82
1990    35531.408   41343.28
1991    31117.801   37257.233
1992    32952.848   37391.836
1993    34551.177   42036.738
1994    38838.97    41694.225
1995    40663.847   43573.315
1996    42598.689   45514.581
1997    46702.656   52088.179
1998    49122.003   55071.921
1999    54147.474   53001.936
2000    58082.434   55704.604
2001    53779.31    52928.46
2002    52153.472   42502.016
2003    53493.69681625  42284.9120525
2004    56454.06451384  43800.02305036
2005    60218.4929039   45510.33799428
2006    61004.84107176  51767.52144762
2007    63111.87209175  55479.45533967
2008    62688.49984317  57351.00459077
2009    50803.48289813  48902.85013178
2010    52740.81484518  51406.46960534
2011    52260.822   56998.314"
        );
        $datasets[] = array(
            'id' => 'marriages',
            'title' => __('Marriages in Germany'),
            'chartid' => '',
            'type' => __('Line chart'),
            'presets' => array(
                'type' => 'line-chart',
                'metadata.describe.source-name' => 'Statistisches Bundesamt',
                'metadata.describe.source-url' => 'http://destatis.de',
                'metadata.data.vertical-header' => true,
                'metadata.data.transpose' => false
            ),
            'data' => __('Year').'  '.__('Marriages')."\n1946\t8.1\n1947\t9.8\n1948\t10.5\n1949\t10.2\n1950\t11.0\n1951\t10.4\n1952\t9.5\n1953\t8.9\n1954\t8.7\n1955\t8.8\n1956\t8.9\n1957\t8.9\n1958\t9.1\n1959\t9.2\n1960\t9.5\n1961\t9.5\n1962\t9.4\n1963\t8.8\n1964\t8.5\n1965\t8.2\n1966\t8.0\n1967\t7.9\n1968\t7.3\n1969\t7.4\n1970\t7.4\n1971\t7.2\n1972\t7.0\n1973\t6.7\n1974\t6.5\n1975\t6.7\n1976\t6.5\n1977\t6.5\n1978\t6.0\n1979\t6.2\n1980\t6.3\n1981\t6.2\n1982\t6.2\n1983\t6.3\n1984\t6.4\n1985\t6.4\n1986\t6.6\n1987\t6.7\n1988\t6.8\n1989\t6.7\n1990\t6.5\n1991\t5.7\n1992\t5.6\n1993\t5.5\n1994\t5.4\n1995\t5.3\n1996\t5.2\n1997\t5.2\n1998\t5.1\n1999\t5.2\n2000\t5.1\n2001\t4.7\n2002\t4.8\n2003\t4.6\n2004\t4.8\n2005\t4.7\n2006\t4.5\n2007\t4.5\n2008\t4.6\n2009\t4.6\n2010\t4.7\n2011\t4.6"
        );
        return $datasets;
    }
}
