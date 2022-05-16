<?php

/**
* --------------------------------------------------------------------------
* CodeIgniter Spark Plus language.
* --------------------------------------------------------------------------
*
* @package         codeIgniter-spark-plus
* @collection      Best Datamweb Tools CI4(BDT-CI4)
* @author          Pooya Parsa Dadashi(@datamweb)
* @link            https://datamweb.ir
* @github_link     https://github.com/datamweb/codeIgniter-spark-plus
* @since           Version 1.0.0
* @datepublic      2022-05-15 | 1401/02/25
* 
*/

// en language SparkPlus Commands
return [
       'generator'  => [

            // test
            'test' => [
                'testName' => 'Please enter your test class name(e.g: MyAnyUNITTEST)?',
                'methodsForTest' => <<<'EOL'

                                        Please enter your methods for test?
                                        If have multi methods, use "%s"
                                        If you do not have a method, use "%s"

                                        Example:
                                            public function IfMyNamePooyaReturnTrue($par1, $par2)%spublic function IfMyNameNotPooyaReturnFalse($data1, $data2)
                                            
                                        EOL,
            ],

            // Languags
            'lang' => [
                'langName' => 'Please enter your Language file name(e.g: MyLangFile)?',

            ],

            // helper
            'helper' => [
                'helperName' => 'Please enter your helper name(e.g: my_heelpeer)?',
                'methodsForHelper' => <<<'EOL'

                                        Please enter your methods for helper?
                                        If have multi methods use "%s"
                                        If you do not have a method, use "%s"

                                        Example:
                                            public function myOneHeleprMethod($par1, $par2)%sprotected function myTwoHeleprMethod($data1, $data2)
                                            
                                        EOL,
            ],

            // Trait 
            'trait' =>[
                'traitName' => "Please enter your trait name(e.g: MyTrraiit)?",
                'methodsForTrait' => <<<'EOL'

                                        Please enter your methods for trait?
                                        If have multi methods use "%s"
                                        If you do not have a method, use "%s"

                                        Example:
                                            public function myOneTraitMethod($par1, $par2)%sprotected function myTwoTraitMethod($data1, $data2)
                                            
                                        EOL,
            ],

            // Library
            'lib' => [
                'libName' => 'Please enter your Library name(e.g: MyLibrary)?',
                'methodsForLib' => <<<'EOL'

                                        Please enter your methods for Library?
                                        If have multi methods use "%s"
                                        If you do not have a method, use "%s".

                                        Example:
                                            public function myOneLibraryMethod($par1, $par2)%sprotected function myTwoLibraryMethod($data1, $data2)
                                            
                                        EOL,
            ],

            // View
            'view' => [
                'viewName' => 'Please enter your view name(e.g: my_view)?',
            ]
            
        ]
];
