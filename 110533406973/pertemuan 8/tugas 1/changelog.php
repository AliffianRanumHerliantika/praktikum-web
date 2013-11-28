**************************************************************************************
* PHPExcel
*
* Copyright (c) 2006 - 2013 PHPExcel
*
* This library is free software; you can redistribute it and/or
* modify it under the terms of the GNU Lesser General Public
* License as published by the Free Software Foundation; either
* version 2.1 of the License, or (at your option) any later version.
*
* This library is distributed in the hope that it will be useful,
* but WITHOUT ANY WARRANTY; without even the implied warranty of
* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU
* Lesser General Public License for more details.
*
* You should have received a copy of the GNU Lesser General Public
* License along with this library; if not, write to the Free Software
* Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA 02110-1301 USA
*
* @copyright Copyright (c) 2006 - 2013 PHPExcel (http://www.codeplex.com/PHPExcel)
* @license http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt LGPL
* @version 1.7.9, 2013-06-02
**************************************************************************************


2013-06-02 (v1.7.9):
- Feature: (MBaker) Include charts option for HTML Writer
- Feature: (MBaker) Added composer file
- Feature: (MBaker) Added getStyle() method to Cell object
- Bugfix: (Asker) Work item 18777 - Error in PHPEXCEL/Calculation.php script on line 2976 (stack pop check)
- Bugfix: (MBaker) Work item 18794 - CSV files without a file extension being identified as HTML
- Bugfix: (AndreKR) Work item GH-66 - Wrong check for maximum number of rows in Excel5 Writer
- Bugfix: (MBaker) Work item GH-67 - Cache directory for DiscISAM cache storage cannot be set
- Bugfix: (MBaker) Work item 17976 - Fix to Excel2007 Reader for hyperlinks with an anchor fragment (following a #), otherwise they were treated as sheet references
- Bugfix: (MBaker) Work item 18963 - getSheetNames() fails on numeric (floating point style) names with trailing zeroes
- Bugfix: (MBaker) Work item GH-130 - Single cell print area
- General: (kea) Work item GH-69 - Improved AdvancedValueBinder for currency
- General: (MBaker) Work items 17936 and 17840 - Fix for environments where there is no access to /tmp but to upload_tmp_dir
                        Provided an option to set the sys_get_temp_dir() call to use the upload_tmp_dir; though by default the standard temp directory will still be used
- General: (amironov ) Work item GH-84 - Search style by identity in PHPExcel_Worksheet::duplicateStyle()
- General: (karak) Work item GH-85 - Fill SheetView IO in Excel5
- General: (cfhay) Work item 18958 - Memory and Speed improvements in PHPExcel_Reader_Excel5
- General: (MBaker) Work item GH-78 - Modify listWorksheetNames() and listWorksheetInfo to use XMLReader with streamed XML rather than SimpleXML
- General: (dbonsch) Restructuring of PHPExcel Exceptions
- General: (MBaker) Work items 16926 and 15145 - Refactor Calculation Engine from singleton to a Multiton
                        Ensures that calculation cache is maintained independently for different workbooks
- General: (MBaker) Modify cell's getCalculatedValue() method to return the content of RichText objects rather than the RichText object itself
- Bugfix: (techhead) Work item GH-70 - Fixed formula/formatting bug when removing rows
- Bugfix: (alexgann) Work item GH-63 - Fix to cellExists for non-existent namedRanges
- Bugfix: (MBaker) Work item 18844 - cache_in_memory_gzip "eats" last worksheet line, cache_in_memory doesn't
- Feature: (Progi1984) Work item GH-22 - Sheet View in Excel5 Writer
- Bugfix: (amironov) Work item GH-82 - PHPExcel_Worksheet::getCellCollection() may not return last cached cell
- Bugfix: (teso) Work item 18551 - Rich Text containing UTF-8 characters creating unreadable content with Excel5 Writer
- Bugfix: (MBaker) Work item GH-104 - echo statements in HTML.php
- Feature: (Progi1984) Work item GH-8/CP11704 : Conditional formatting in Excel 5 Writer
- Bugfix: (MBaker) Work item GH-113 - canRead() Error for GoogleDocs ODS files: in ODS files from Google Docs there is no mimetype file
- Bugfix: (MBaker) Work item GH-80 - "Sheet index is out of bounds." Exception
- Bugfix: (ccorliss) Work item GH-105 - Fixed number format fatal error
- Bugfix: (MBaker) - Add DROP TABLE in destructor for SQLite and SQLite3 cache controllers
- Bugfix: (alexgann) Work item GH-154 - Fix merged-cell borders on HTML/PDF output
- Bugfix: (Shanto) Work item GH-161 - Fix: Hyperlinks break when removing rows
- Bugfix: (neclimdul) Work item GH-166 - Fix Extra Table Row From Images and Charts


--------------------------------------------------------------------------------
BREAKING CHANGE! As part of the planned changes for handling array formulae in
workbooks, there are some changes that will affect the PHPExcel_Cell object
methods.

The following methods are now deprecated, and will be removed in or after version 1.8.0:
    getCalculatedValue() The getValue() method will return calculated
                                  values for cells containing formulae instead.
    setCalculatedValue() The cell value will always contain the result of a
                                  any formula calculation.
    setFormulaAttributes() Will now be determined by the arguments to the
                                  setFormula() method.
    getFormulaAttributes() This will be replaced by the getArrayFormulaRange()
                                  method.

The following methods will be added in version 1.8.0
    getFormula() Use to retrieve a cell formula, will return the cell
                                  value if the cell doesn't contain a formula, or
                                  is not part of an array formula range.
    setFormula() Use to set a cell formula. It will still be possible
                                  to set formulae using the setValue() and
                                  setValueExplicit() methods.
    calculate() Use to execute a formula calculation to update the
                                  cell value.
    isFormula() Use to determine if a cell contains a formula, or is
                                  part of an array formula range or not.
    isArrayFormula() Use to determine if a cell contains an array formula,
                                 or is part of an array formula range or not.
    getArrayFormulaRange() Use to retrieve an array formula range.

The following methods will be changed in version 1.8.0
    setValue() The logic behind this will be modified to store
                                  formula values in the new cell property structure,
                                  but it will still perform the same function.
    setValueExplicit() The logic behind this will be modified to store
                                  formula values in the new cell property structure,
                                  but it will still perform the same function.
    getValue() Will no longer return a formula if the cell contains
                                  a formula, but will return the calculated value
                                  instead. For cells that don't contain a formula,
                                  it will still return the stored value.
    getDataType() Will return the datatype of the calculated value for
                                  cells that contain formulae.
    setDataType() Error handling will be added to prevent setting a
                                  cell datatype to an inappropriate value.
--------------------------------------------------------------------------------


2012-10-12 (v1.7.8):
- Special: (kkamkou) Phar builder script to add phar file as a distribution option
- Feature: (MBaker) Refactor PDF Writer to allow use with a choice of PDF Rendering library
                         rather than restricting to tcPDF
                         Current options are tcPDF, mPDF, DomPDF
                         tcPDF Library has now been removed from the deployment bundle
- Feature: (MBaker) Initial version of HTML Reader
- Feature: (Progi1984) & (blazzy) Work items 9605 - Implement support for AutoFilter in PHPExcel_Writer_Excel5
- Feature: (MBaker) Modified ERF and ERFC Engineering functions to accept Excel 2010's modified acceptance of negative arguments
- Feature: (k1LoW) Support SheetView `view` attribute (Excel2007)
- Feature: (MBaker) Excel compatibility option added for writing CSV files
                         While Excel 2010 can read CSV files with a simple UTF-8 BOM, Excel2007 and earlier require UTF-16LE encoded tab-separated files.
                         The new setExcelCompatibility(TRUE) option for the CSV Writer will generate files with this formatting for easy import into Excel2007 and below.
- Feature: (MBaker) Language implementations for Turkish (tr)
- Feature: (MBaker) Added fraction tests to advanced value binder
- Feature: (MBaker) Allow call to font setUnderline() for underline format to specify a simple boolean for UNDERLINE_NONE or UNDERLINE_SINGLE
- General: (alexgann) Add Currency detection to the Advanced Value Binder
- General: (MBaker) Work item 18404 - setCellValueExplicitByColumnAndRow() do not return PHPExcel_Worksheet
- General: (MBaker) Work item 18324 - Reader factory doesn't read anymore XLTX and XLT files
- General: (MBaker) Magic __toString() method added to Cell object to return raw data value as a string
- General: (alexgann) Add cell indent to html rendering
- General: (Raghav1981) ZeroHeight for rows in sheet format
- Bugfix: (cyberconte) Patch 12318 - OOCalc cells containing <text:span> inside the <text:p> tag
- Bugfix: (schir1964) Fix to listWorksheetInfo() method for OOCalc Reader
- Bugfix: (MBaker) Support for "e" (epoch) date format mask
                         Rendered as a 4-digit CE year in non-Excel outputs
- Bugfix: (MBaker) Work items 15799 and 18278 - Background color cell is always black when editing cell
- Bugfix: (MBaker) Work items 15905 and 18183 - Allow "no impact" to formats on Conditional Formatting
- Bugfix: (wackonline) OOCalc Reader fix for NULL cells
- Bugfix: (seltzlab) Fix to excel2007 Chart Writer when a $plotSeriesValues is empty
- Bugfix: (MBaker) Various fixes to Chart handling
- Bugfix: (MBaker) Work item 18370 - Error loading xlsx file with column breaks
- Bugfix: (MBaker) OOCalc Reader now handles percentage and currency data types
- Bugfix: (MBaker) Work Item 18415 - mb_stripos empty delimiter
- Bugfix: (takaakik) Work Item 15455 - getNestingLevel() Error on Excel5 Read
- Bugfix: (MBaker) Fix to Excel5 Reader when cell annotations are defined before their referenced text objects
- Bugfix: (MBaker) OOCalc Reader modified to process number-rows-repeated
- Bugfix: (MBaker) Work item 18377 - Chart Title compatibility on Excel 2007
- Bugfix: (MBaker) Work item 18146 - Chart Refresh returning cell reference rather than values
- Bugfix: (MBaker) Work item 18145 - Autoshape being identified in twoCellAnchor when includeCharts is TRUE triggering load error
- Bugfix: (MBaker) Work item 18325 - v-type texts for series labels now recognised and parsed correctly
- Bugfix: (wolf5x) Work item 18492 - load file failed if the file has no extensionType
- Bugfix: (dverspui) Pattern fill colours in Excel2007 Style Writer
- Bugfix: (MBaker) Excel2007 Writer order of font style elements to conform with Excel2003 using compatibility pack
- Bugfix: (MBaker) Work item 18425 - Problems with $_activeSheetIndex when decreased below 0.
- Bugfix: (MBaker) Work item 18597 - PHPExcel_CachedObjectStorage_SQLite3::cacheMethodIsAvailable() uses class_exists - autoloader throws error
- Bugfix: (MBaker) Work item 18598 - Cannot access private property PHPExcel_CachedObjectStorageFactory::$_cacheStorageMethod
- Bugfix: (MBaker) Work item 18397 - Data titles for charts
                         PHPExcel_Chart_Layout now has methods for getting/setting switches for displaying/hiding chart data labels
- Bugfix: (MBaker) Discard single cell merge ranges when reading (stupid that Excel allows them in the first place)
- Bugfix: (MBaker) Discard hidden autoFilter named ranges


2012-05-19 (v1.7.7):
- Bugfix: (Progi1984) Work item 8916 - Support for Rich-Text in PHPExcel_Writer_Excel5
- Bugfix: (cyberconte) Work item 17471 - OOCalc cells contain same data bug?
- Feature: (schir1964) listWorksheetInfo() method added to Readers... courtesy of Christopher Mullins
- Feature: (MBaker) Options for cell caching using Igbinary and SQLite/SQlite3.
- Feature: (MBaker) Additional row iterator options: allow a start row to be defined in the constructor; seek(), and prev() methods added.
- Feature: (Progi1984) Work item 9759 - Implement document properties in Excel5 writer
- Feature: (MBaker) Work item 16 - Implement chart functionality (EXPERIMENTAL)
                        Initial definition of chart objects.
                        Reading Chart definitions through the Excel2007 Reader
                        Facility to render charts to images using the 3rd-party jpgraph library
                        Writing Charts using the Excel2007 Writer
- General: (MBaker) Fix to build to ensure that Examples are included with the documentation
- General: (MBaker) Reduce cell caching overhead using dirty flag to ensure that cells are only rewritten to the cache if they have actually been changed
- General: (MBaker) Improved memory usage in CSV Writer
- General: (MBaker) Improved speed and memory usage in Excel5 Writer
- General: (MBaker) Experimental -
                        Added getHighestDataColumn(), getHighestDataRow(), getHighestRowAndColumn() and calculateWorksheetDataDimension() methods for the worksheet that return the highest row and column that have cell records
- General: (MBaker) Change iterators to implement Iterator rather than extend CachingIterator, as a fix for PHP 5.4. changes in SPL
- Bugfix: (MBaker) Work item 15459 - Invalid cell coordinate in Autofilter for Excel2007 Writer
- Bugfix: (MBaker) Work item 15518 - PCLZip library issue
- Bugfix: (MBaker) Work item 15537 - Excel2007 Reader canRead function bug
- Bugfix: (MBaker) Support for Excel functions whose return can be used as either a value or as a cell reference depending on its context within a formula
- Bugfix: (gilles06) Work item 15707 - ini_set() call in Calculation class destructor
- Bugfix: (MBaker) Work item 15786 - RangeToArray strange array keys
- Bugfix: (MBaker) Work item 15762 - INDIRECT() function doesn't work with named ranges
- Bugfix: (MBaker) Locale-specific fix to text functions when passing a boolean argument instead of a string
- Bugfix: (MBaker) Work item 16246 - reader/CSV fails on this file
                        auto_detect_line_endings now set in CSV reader
- Bugfix: (MBaker) Work item 16212 - $arguments improperly used in CachedObjectStorage/PHPTemp.php
- Bugfix: (MBaker) Work item 16643 - Bug In Cache System (cell reference when throwing caching errors)
- Bugfix: (MBaker) Work item 16895 - PHP Invalid index notice on writing excel file when active sheet has been deleted
- Bugfix: (MBaker) Work item 16956 - External links in Excel2010 files cause Fatal error
- Bugfix: (MBaker) Work item 16960 - Previous calculation engine error conditions trigger cyclic reference errors
- Bugfix: (mkopinsky) Work item 16266 - PHPExcel_Style::applyFromArray() returns null rather than style object in advanced mode
- Bugfix: (fauvel) Work item 16958 - Cell::getFormattedValue returns RichText object instead of string
- Bugfix: (MBaker) Work item 17166 - Indexed colors do not refer to Excel's indexed colors?
- Bugfix: (MBaker) Work item 17199 - Indexed colors should be consistent with Excel and start from 1 (current index starts at 0)
- Bugfix: (MBaker) Work item 17262 - Named Range definition in .xls when sheet reeference is quote wrapped
- Bugfix: (MBaker) Work item 17403 - duplicateStyle() method doesn't duplicate conditional formats
                                          Added an equivalent duplicateConditionalStyle() method for duplicating conditional styles
- Bugfix: (bnr) Work item 17501 - =sumproduct(A,B) <> =sumproduct(B,A) in xlsx
- Bugfix: (Progi1984) Work item 8916 - Support for Rich-Text in PHPExcel_Writer_Excel5
- General: (MBaker) Work item 15405 - Two easy to fix Issues concerning PHPExcel_Token_Stack (l10n/UC)
- General: (MBaker) Work item 15461 - Locale file paths not fit for windows
- General: (MBaker) Work item 16643 - Add file directory as a cache option for cache_to_discISAM
- General: (MBaker) Work item 16923 - Datatype.php & constant TYPE_NULL
- General: (MBaker) Ensure use of system temp directory for all temporary work files, unless explicitly specified
- General: (char101) Work item 16359 - [Patch] faster stringFromColumnIndex()
- General: (whit1206) Work item 16028 - Fix for projects that still use old autoloaders
- General: (atz) Work item 17024 - Unknown codepage: 10007
                        Additional Mac codepages


2011-02-27 (v1.7.6):
- Feature: (MBaker) Provide option to use PCLZip as an alternative to ZipArchive.
                      This allows the writing of Excel2007 files, even without ZipArchive enabled (it does require zlib), or when php_zip is one of the buggy PHP 5.2.6 or 5.2.8 versions
                      It can be enabled using PHPExcel_Settings::setZipClass(PHPExcel_Settings::PCLZIP);
                      Note that it is not yet implemented as an alternative to ZipArchive for those Readers that are extracting from zips
- Feature: (MBaker) Work item 14979 - Added listWorksheetNames() method to Readers that support multiple worksheets in a workbook, allowing a user to extract a list of all the worksheet names from a file without parsing/loading the whole file.
- Feature: (MBaker) Speed boost and memory reduction in the Worksheet toArray() method.
- Feature: (MBaker) Added new rangeToArray() and namedRangeToArray() methods to the PHPExcel_Worksheet object.
                      Functionally, these are identical to the toArray() method, except that they take an additional first parameter of a Range (e.g. 'B2:C3') or a Named Range name.
                      Modified the toArray() method so that it actually uses rangeToArray().
- Feature: (MBaker) Added support for cell comments in the OOCalc, Gnumeric and Excel2003XML Readers, and in the Excel5 Reader
- Feature: (MBaker) Improved toFormattedString() handling for Currency and Accounting formats to render currency symbols
- Feature: (MBaker) Work Item 2346 - Implement more Excel calculation functions
                      Implemented the DAVERAGE(), DCOUNT(), DCOUNTA(), DGET(), DMAX(), DMIN(), DPRODUCT(), DSTDEV(), DSTDEVP(), DSUM(), DVAR() and DVARP() Database functions
- Bugfix: (MBaker) Work item 14888 - Simple =IF() formula disappears
- Bugfix: (MBaker) Work item 14898 - PHP Warning: preg_match(): Compilation failed: PCRE does not support \\L, \\l, \\N, \\P, \\p, \\U, \\u, or \\X
- Bugfix: (MBaker) Work item 14901 - VLOOKUP choking on parameters in PHPExcel.1.7.5/PHPExcel_Writer_Excel2007
- Bugfix: (MBaker) Work item 14973 - PHPExcel_Cell::isInRange() incorrect results - offset by one column
- Bugfix: (MBaker) Treat CodePage of 0 as CP1251 (for .xls files written by applications that don't set the CodePage correctly, such as Apple Numbers)
- Bugfix: (MB) Work item 11583 - Need method for removing autoFilter
- Bugfix: (MBaker) Work item 15029 - coordinateFromString throws exception for rows greater than 99,999
- Bugfix: (MBaker) Work item 14999 - PHPExcel Excel2007 Reader colour problems with solidfill
- Bugfix: (MBaker) Work item 13215 - Formatting get lost and edit a template XLSX file
- Bugfix: (MBaker) Work item 14029 - Excel 2007 Reader /writer lost fontcolor
- Bugfix: (MBaker) Work item 13374 - file that makes cells go black
- Bugfix: (MBaker) Minor patchfix for Excel2003XML Reader when XML is defined with a charset attribute
- Bugfix: (MBaker) Work item 15089 - PHPExcel_Worksheet->toArray() index problem
- Bugfix: (MBaker) Work item 15094 - Merge cells 'un-merge' when using an existing spreadsheet
- Bugfix: (MBaker) Work item 15129 - Worksheet fromArray() only working with 2-D arrays
- Bugfix: (xkeshav) Work item 15172 - rangeToarray function modified for non-existent cells
- Bugfix: (MBaker) Work item 14980 - Images not getting copyied with the ->clone function
- Bugfix: (MBaker) Work item 11576 - AdvancedValueBinder.php: String sometimes becomes a date when it shouldn't
- Bugfix: (MBaker) Fix Excel5 Writer so that it only writes column dimensions for columns that are actually used rather than the full range (A to IV)
- Bugfix: (MBaker) Work item 15198 - FreezePane causing damaged or modified error
                      The freezePaneByColumnAndRow() method row argument should default to 1 rather than 0.
                      Default row argument for all __ByColumnAndRow() methods should be 1
- Bugfix: (MBaker) Work item 15121 - Column reference rather than cell reference in Print Area definition
                      Fix Excel2007 Writer to handle print areas that are defined as row or column ranges rather than just as cell ranges
- Bugfix: (MBaker) Reduced false positives from isDateTimeFormatCode() method by suppressing testing within quoted strings
- Bugfix: (MBaker) Work item 15312 - Caching and tmp partition exhaustion
- Bugfix: (MBaker) Work item 15308 - Writing to Variable No Longer Works. $_tmp_dir Missing in PHPExcel\PHPExcel\Shared\OLE\PPS\Root.php
- Bugfix: (MBaker) Work item 15379 - Named ranges with dot don't get parsed properly
- Bugfix: (MBaker) Work item 15096 - insertNewRowBefore fails to consistently update references
- Bugfix: (MBaker) "i" is not a valid character for Excel date format masks (in isDateTimeFormatCode() method)
- Bugfix: (MKunert) Work item 15421 - PHPExcel_ReferenceHelper::insertNewBefore() is missing an 'Update worksheet: comments' section
- Bugfix: (MBaker) Work item 15409 - Full column/row references in named ranges not supported by updateCellReference()
- General: (MBaker) Improved performance (speed), for building the Shared Strings table in the Excel2007 Writer.
- General: (MBaker) Improved performance (speed), for PHP to Excel date conversions
- General: (MBaker) Enhanced SheetViews element structures in the Excel2007 Writer for frozen panes.
- General: (MBaker) Removed Serialized Reader/Writer as these no longer work.


2010-12-10 (v1.7.5):
- Feature: (MBaker) Work item 8769 - Implement Gnumeric File Format
                        Initial work on Gnumeric Reader (Worksheet Data, Document Properties and basic Formatting)
- Feature: (MBaker) (incorporating part of Workitem 9759) - Support for Extended Workbook Properties in Excel2007, Excel5 and OOCalc Readers; support for User-defined Workbook Properties in Excel2007 and OOCalc Readers
- Feature: (MBaker) Support for Extended and User-defined Workbook Properties in Excel2007 Writer
- Feature: (MBaker) Provided a setGenerateSheetNavigationBlock(false); option to suppress generation of the sheet navigation block when writing multiple worksheets to HTML
- Feature: (MBaker) Advanced Value Binder now recognises TRUE/FALSE strings (locale-specific) and converts to boolean
- Feature: (MBaker) Work item 14301 - PHPExcel_Worksheet->toArray() is returning truncated values
- Feature: (MBaker) Configure PDF Writer margins based on Excel Worksheet Margin Settings value
- Feature: (MBaker) Added Contiguous flag for the CSV Reader, when working with Read Filters
- Feature: (MBaker) Added getFormattedValue() method for cell object
- Feature: (MBaker) Added strictNullComparison argument to the worksheet fromArray() method
- Feature: (MBaker) Fix to toFormattedString() method in PHPExcel_Style_NumberFormat to handle fractions with a # code for the integer part
- Bugfix: (MB) Work item 14143 - NA() doesn't propagate in matrix calc - quick fix in JAMA/Matrix.php
- Bugfix: (Progi1984) Work item 7895 - Excel5 : Formula : String constant containing double quotation mark
- Bugfix: (Progi1984) Work item 7895 - Excel5 : Formula : Percent
- Bugfix: (Progi1984) Work item 7895 - Excel5 : Formula : Error constant
- Bugfix: (Progi1984) Work item 7895 - Excel5 : Formula : Concatenation operator
- Bugfix: (MBaker) Work item 14146 - Worksheet clone broken for CachedObjectStorage_Memory
- Bugfix: (MBaker) Work item 12998 - PHPExcel_Reader_Excel2007 fails when gradient fill without type is present in a file
- Bugfix: (MBaker) Work item 14176 - @ format for numeric strings in XLSX to CSV conversion
- Bugfix: (MBaker) Work item 14223 - Advanced Value Binder Not Working?
- Bugfix: (MBaker) Work item 14226 - unassigned object variable in PHPExcel->removeCellXfByIndex
- Bugfix: (MBaker) Work item 14236 - problem with getting cell values from another worksheet... (if cell doesn't exist)
- Bugfix: (MBaker) Work items 14260 & 14233 - Setting cell values to one char strings & Trouble reading one character string (thanks gorfou)
- Bugfix: (MBaker) Work item 14256 - Worksheet title exception when duplicate worksheet is being renamed but exceeds the 31 character limit
- Bugfix: (MBaker) Work item 14086 - Named range with sheet name that contains the $ throws exception when getting the cell
- Bugfix: (MBaker) Added autoloader to DefaultValueBinder and AdvancedValueBinder
- Bugfix: (MBaker) Modified PHPExcel_Shared_Date::isDateTimeFormatCode() to return false if format code begins with "_" or with "0 " to prevent false positives
                        These leading characters are most commonly associated with number, currency or accounting (or occasionally fraction) formats
- Bugfix: (MBaker) Work item 14374 - BUG : Excel5 and setReadFilter ?
- Bugfix: (MBaker) Work item 14425 - Wrong exception message while deleting column
- Bugfix: (MBaker) Work item 14679 - Formula evaluation fails with Japanese sheet refs
- Bugfix: (MBaker) Work item 13559 - PHPExcel_Writer_PDF does not handle cell borders correctly
- Bugfix: (MBaker) Work item 14831 - Style : applyFromArray() for 'allborders' not working
- Bugfix: (MBaker) Work item 14837 - Using $this when not in object context in Excel5 Reader
- General: (MBaker) Applied patch 6609 - Removes a unnecessary loop through each cell when applying conditional formatting to a range.
- General: (MBaker) Applied patch 7169 - Removed spurious PHP end tags (?>)
- General: (MBaker) Improved performance (speed) and reduced memory overheads, particularly for the Writers, but across the whole library.


2010-08-26 (v1.7.4):
- Bugfix: (Progi1984) Work item 7895 - Excel5 : Formula : Power
- Bugfix: (Progi1984) Work item 7895 - Excel5 : Formula : Unary plus
- Bugfix: (Progi1984) Excel5 : Just write the Escher stream if necessary in Worksheet
- Bugfix: (MBaker) Work item 13433 - Syntax errors in memcache.php 1.7.3c
- Bugfix: (MBaker) Work item 13450 - Standard Deviation functions returning DIV/0 Error when Standard Deviation is zero
- Feature: (MBaker) Support for print area with several ranges in the Excel2007 reader, and improved features for editing print area with several ranges
- Feature: (MBaker) Work item 13769 - Improved Cell Exception Reporting
- Feature: (MBaker) Support for row or column ranges in the calculation engine, e.g. =SUM(C:C) or =SUM(1:2)
                        Also support in the calculation engine for absolute row or column ranges e.g. =SUM($C:$E) or =SUM($3:5)
- Bugfix: (ET) Work item 13455 - Picture problem with Excel 2003
- Bugfix: (MBaker) Work item 13484 - Wrong variable used in addExternalSheet in PHPExcel.php
- Bugfix: (MBaker) Work item 13515 - "Invalid cell coordinate" error when formula access data from an other sheet
- Bugfix: (MBaker) (related to Work item 13515) Calculation engine confusing cell range worksheet when referencing cells in a different worksheet to the formula
- Bugfix: (MBaker) Work item 13752 - Wrong var naming in Worksheet->garbageCollect()
- Bugfix: (MBaker) Work item 13764 - PHPExcel_Style_*::__clone() methods cause cloning loops?
- Bugfix: (MBaker) Work item 11488 - Recent builds causing problems loading xlsx files? (ZipArchive issue?)
- Bugfix: (MBaker) Work item 13856 - cache_to_apc causes fatal error when processing large data sets
- Bugfix: (MBaker) Work item 13880 - OOCalc reader misses first line if it's a 'table-header-row'
- Bugfix: (MBaker) Work item 14011 - using cache with copy or clone bug?
                                        Fixed $worksheet->copy() or clone $worksheet when using cache_in_memory, cache_in_memory_gzip, cache_in_memory_serialized, cache_to_discISAM, cache_to_phpTemp, cache_to_apc and cache_to_memcache;
                                        Fixed but untested when using cache_to_wincache.
- Bugfix: (MBaker) Fixed problems with reading Excel2007 Properties
- General: (MB) Applied patch 6324 - PHP Strict Standards: Non-static method PHPExcel_Shared_String::utf16_decode() should not be called statically
- General: (MBaker) Applied patch 6360 - Array functions were ignored when loading an existing file containing them, and as a result, they would lose their 'cse' status.
- General: (MBaker) Minor memory tweaks to Excel2007 Writer
- General: (MBaker) Modified ReferenceHelper updateFormulaReferences() method to handle updates to row and column cell ranges (including absolute references e.g. =SUM(A:$E) or =SUM($5:5), and range/cell references that reference a worksheet by name), and to provide both performance and memory improvements.
- General: (MBaker) Modified Excel2007 Reader so that ReferenceHelper class is instantiated only once rather than for every shared formula in a workbook.
- General: (MBaker) Correct handling for additional (synonym) formula tokens in Excel5 Reader
- General: (MBaker) Additional reading of some Excel2007 Extended Properties (Company, Manager)


2010-06-01 (v1.7.3c):
- Bugfix: (MB) Work item 13012 - Fatal error: Class 'ZipArchive' not found... ...Reader/Excel2007.php on line 217
- Bugfix: (MBaker) Work item 13398 - PHPExcel_Writer_Excel2007 error after 1.7.3b


2010-05-31 (v1.7.3b):
- Bugfix: (MBaker) Work item 12903 - Infinite loop when reading
- Bugfix: (MB) Work item 13381 - Wrong method chaining on PHPExcel_Worksheet class


2010-05-17 (v1.7.3):
- General: (ET) Applied patch 4990 (modified)
- General: (MB) Applied patch 5568 (modified)
- General: (MB) Applied patch 5943
- General: (MB) Work item 13042 - Upgrade build script to use Phing
- General: (ET) Work item 11586 - Replacing var with public/private
- General: (MBaker) Applied Anthony's Sterling's Class Autoloader to reduce memory overhead by "Lazy Loading" of classes
- General: (MBaker) Modification to functions that accept a date parameter to support string values containing ordinals as per Excel (English language only)
- General: (MBaker) Modify PHPExcel_Style_NumberFormat::toFormattedString() to handle dates that fall outside of PHP's 32-bit date range
- General: (MBaker) Applied patch 5207
- General: (ET) Work item 11970 - PHPExcel developer documentation: Set page margins
- Feature: (ET) Work item 11038 - Special characters and accents in SYLK reader
- Feature: (MBaker) Work Item 2346 - Implement more Excel calculation functions
                     - Implemented the COUPDAYS(), COUPDAYBS(), COUPDAYSNC(), COUPNCD(), COUPPCD() and PRICE() Financial functions
                     - Implemented the N() and TYPE() Information functions
                     - Implemented the HYPERLINK() Lookup and Reference function
- Feature: (ET) Work item 11526 - Horizontal page break support in PHPExcel_Writer_PDF
- Feature: (ET) Work item 11529 - Introduce method setActiveSheetIndexByName()
- Feature: (ET) Work item 11550 - AdvancedValueBinder.php: Automatically wrap text when there is new line in string (ALT+"Enter")
- Feature: (ET) Work item 10300 - Data validation support in PHPExcel_Reader_Excel5 and PHPExcel_Writer_Excel5
- Feature: (MB) Work item 11616 - Improve autosize calculation
- Feature: (MBaker) Methods to translate locale-specific function names in formulae
                     - Language implementations for Czech (cs), Danish (da), German (de), English (uk), Spanish (es), Finnish (fi), French (fr), Hungarian (hu), Italian (it), Dutch (nl), Norwegian (no), Polish (pl), Portuguese (pt), Brazilian Portuguese (pt_br), Russian (ru) and Swedish (sv)
- Feature: (ET) Work item 9759 - Implement document properties in Excel5 reader/writer
                     - Fixed so far for PHPExcel_Reader_Excel5
- Feature: (ET) Work item 11849 - Show/hide row and column headers in worksheet
- Feature: (ET) Work item 11919 - Can't set font on writing PDF (by key)
- Feature: (ET) Work item 12096 - Thousands scale (1000^n) support in PHPExcel_Style_NumberFormat::toFormattedString
- Feature: (ET) Work item 6911 - Implement repeating rows in PDF and HTML writer
- Feature: (ET) Work item 12289 - Sheet tabs in PHPExcel_Writer_HTML
- Feature: (MB) Work item 13041 - Add Wincache CachedObjectProvider
- Feature: (MBaker) Configure PDF Writer paper size based on Excel Page Settings value, and provided methods to override paper size and page orientation with the writer
                     - Note PHPExcel defaults to Letter size, while the previous PDF writer enforced A4 size, so PDF writer will now default to Letter
- Feature: (MBaker) Initial implementation of cell caching: allowing larger workbooks to be managed, but at a cost in speed
- Feature: (MBaker) Added an identify() method to the IO Factory that identifies the reader which will be used to load a particular file without actually loading it.
- Bugfix: (MBaker) Work item 10979 - Warning messages with INDEX function having 2 arguments
- Bugfix: (ET) Work item 11473 - setValue('=') should result in string instead of formula
- Bugfix: (MBaker) Work item 11471 - method _raiseFormulaError should no be private
- Bugfix: (ET) Work item 11485 - Fatal error: Call to undefined function mb_substr() in ...Classes\PHPExcel\Reader\Excel5.php on line 2903
- Bugfix: (ET) Work item 11487 - getBold(), getItallic(), getStrikeThrough() not always working with PHPExcel_Reader_Excel2007
- Bugfix: (ET) Work item 11492 - AdvancedValueBinder.php not working correctly for $cell->setValue('hh:mm:ss')
- Bugfix: (MBaker) Fixed leap year handling for the YEARFRAC() Date/Time function when basis ia 1 (Actual/actual)
- Bugfix: (MBaker) Work item 11490 - Warning messages
                     - Calculation Engine code modified to enforce strict standards for pass by reference
- Bugfix: (ET) Work item 11483 - PHPExcel_Cell_AdvancedValueBinder doesnt work for dates in far future
- Bugfix: (ET) Work item 11528 - MSODRAWING bug with long CONTINUE record in PHPExcel_Reader_Excel5
- Bugfix: (ET) Work item 11571 - PHPExcel_Reader_Excel2007 reads print titles as named range when there is more than one sheet
- Bugfix: (ET) Work item 11561 - missing @return in phpdocblock in reader classes
- Bugfix: (ET) Work item 11576 - AdvancedValueBinder.php: String sometimes becomes a date when it shouldn't
- Bugfix: (ET) Work item 11588 - Small numbers escape treatment in PHPExcel_Style_NumberFormat::toFormattedString()
- Bugfix: (ET) Work item 11590 - Blank styled cells are not blank in output by HTML writer due to &nbsp;
- Bugfix: (MBaker) Work item 11587 - Calculation engine bug: Existing, blank cell + number gives #NUM
- Bugfix: (ET) Work item 11608 - AutoSize only measures length of first line in cell with multiple lines (ALT+Enter)
- Bugfix: (ET) Work item 11608 - Fatal error running Tests/12serializedfileformat.php (PHPExcel 1.7.2)
- Bugfix: (MBaker) Fixed various errors in the WORKDAY() and NETWORKDAYS() Date/Time functions (particularly related to holidays)
- Bugfix: (ET) Work item 11660 - Uncaught exception 'Exception' with message 'Valid scale is between 10 and 400.' in Classes/PHPExcel/Worksheet/SheetView.php:115
- Bugfix: (ET) Work item 11551 - "Unrecognized token 39 in formula" with PHPExcel_Reader_Excel5 (occuring with add-in functions)
- Bugfix: (ET) Work item 11668 - Excel2007 reader not reading PHPExcel_Style_Conditional::CONDITION_EXPRESSION
- Bugfix: (MBaker) Fix to the BESSELI(), BESSELJ(), BESSELK(), BESSELY() and COMPLEX() Engineering functions to use correct default values for parameters
- Bugfix: (MBaker) Work item 11525 - DATEVALUE function not working for pure time values + allow DATEVALUE() function to handle partial dates (e.g. "1-Jun" or "12/2010")
- Bugfix: (MBaker) Fix for empty quoted strings in formulae
- Bugfix: (MBaker) Trap for division by zero in Bessel functions
- Bugfix: (MBaker) Fix to OOCalc Reader to convert semi-colon (;) argument separator in formulae to a comma (,)
- Bugfix: (ET) Work item 11693 - PHPExcel_Writer_Excel5_Parser cannot parse formula like =SUM(C$5:C5)
- Bugfix: (MBaker) Fix to OOCalc Reader to handle dates that fall outside 32-bit PHP's date range
- Bugfix: (ET) Work item 11692 - File->sys_get_temp_dir() can fail in safe mode
- Bugfix: (ET) Work item 11727 - Sheet references in Excel5 writer do not work when referenced sheet title contains non-Latin symbols
- Bugfix: (ET) Work item 11743 - Bug in HTML writer can result in missing rows in output
- Bugfix: (ET) Work item 11674 - setShowGridLines(true) not working with PHPExcel_Writer_PDF
- Bugfix: (ET) Work item 11836 - PHPExcel_Worksheet_RowIterator initial position incorrect
- Bugfix: (ET) Work item 11835 - PHPExcel_Worksheet_HeaderFooterDrawing Strict Exception thrown (by jshaw86)
- Bugfix: (ET) Work item 11850 - Parts of worksheet lost when there are embedded charts (Excel5 reader)
- Bugfix: (MBaker) VLOOKUP() function error when lookup value is passed as a cell reference rather than an absolute value
- Bugfix: (ET) Work item 12041 - First segment of Rich-Text not read correctly by PHPExcel_Reader_Excel2007
- Bugfix: (MBaker) Work item 12048 - Fatal Error with getCell('name') when name matches the pattern for a cell reference
- Bugfix: (ET) Work item 12039 - excel5 writer appears to be swapping image locations
- Bugfix: (ET) Work item 11954 - Undefined index: host in ZipStreamWrapper.php, line 94 and line 101
- Bugfix: (ET) Work item 11672 - BIFF8 File Format problem (too short COLINFO record)
- Bugfix: (ET) Work item 12121 - Column width sometimes changed after read/write with Excel2007 reader/writer
- Bugfix: (ET) Work item 11964 - Worksheet.php throws a fatal error when styling is turned off via setReadDataOnly on the reader
- Bugfix: (MBaker) Work item 11851 - Checking for Circular References in Formulae
                     - Calculation Engine code now traps for cyclic references, raising an error or throwing an exception, or allows 1 or more iterations through cyclic references, based on a configuration setting
- Bugfix: (ET) Work item 12244 - PNG transparency using Excel2007 writer
- Bugfix: (ET) Work item 12221 - Custom readfilter error when cell formulas reference excluded cells (Excel5 reader)
- Bugfix: (ET) Work item 12288 - Protection problem in XLS
- Bugfix: (ET) Work item 12300 - getColumnDimension()->setAutoSize() incorrect on cells with Number Formatting
- Bugfix: (ET) Work item 12378 - Notices reading Excel file with Add-in funcitons (PHPExcel_Reader_Excel5)
- Bugfix: (ET) Work item 12380 - Excel5 reader not reading formulas with deleted sheet references
- Bugfix: (ET) Work item 12404 - Named range (defined name) scope problems for in PHPExcel
- Bugfix: (ET) Work item 12423 - PHP Parse error: syntax error, unexpected T_PUBLIC in PHPExcel/Calculation.php on line 3482
- Bugfix: (ET) Work item 12505 - Named ranges don't appear in name box using Excel5 writer
- Bugfix: (ET) Work item 12509 - Many merged cells + autoSize column -> slows down the writer
- Bugfix: (ET) Work item 12539 - Incorrect fallback order comment in Shared/Strings.php ConvertEncoding()
- Bugfix: (ET) Work item 12538 - IBM AIX iconv() will not work, should revert to mbstring etc. instead
- Bugfix: (ET) Work item 12568 - Excel5 writer and mbstring functions overload
- Bugfix: (MBaker) Work item 12672 - OFFSET needs to flattenSingleValue the $rows and $columns args
- Bugfix: (MBaker) Work item 12546 - Formula with DMAX(): Notice: Undefined offset: 2 in ...\PHPExcel\Calculation.php on line 2365
                     - Note that the Database functions have not yet been implemented
- Bugfix: (MBaker) Work item 12839 - Call to a member function getParent() on a non-object in Classes\\PHPExcel\\Calculation.php Title is required
- Bugfix: (MBaker) Work item 12935 - Cyclic Reference in Formula
- Bugfix: (MBaker) Work item 13025 - Memory error...data validation?


2010/01/11 (v1.7.2):
- General: (ET) Applied patch 4362
- General: (ET) Applied patch 4363 (modified)
- General: (MBaker) Work item 10874 - 1.7.1 Extremely Slow - Refactored PHPExcel_Calculation_Functions::flattenArray() method and set calculation cache timer default to 2.5 seconds
- General: (MBaker) Allow formulae to contain line breaks
- General: (ET) Work item 10910 - split() function deprecated in PHP 5.3.0
- General: (ET) sys_get_temp_dir() requires PHP 5.2.1, not PHP 5.2 [provide fallback function for PHP 5.2.0]
- General: (MBaker) Applied patch 4640 - Implementation of the ISPMT() Financial function by Matt Groves
- General: (MBaker) Work item 11052 - Put the example of formula with more arguments in documentation
- General: (MBaker) Improved accuracy for the GAMMAINV() Statistical Function
- Feature: (ET) Work item 10409 - XFEXT record support to fix colors change from Excel5 reader, and copy/paste color change with Excel5 writer
                     - Excel5 reader reads RGB color information in XFEXT records for borders, font color and fill color
- Feature: (MBaker) Work Item 2346 - Implement more Excel calculation functions
                     - Implemented the FVSCHEDULE(), XNPV(), IRR(), MIRR(), XIRR() and RATE() Financial functions
                     - Implemented the SUMPRODUCT() Mathematical function
                     - Implemented the ZTEST() Statistical Function
- Feature: (ET) Work item 10919 - Multiple print areas in one sheet
- Feature: (ET) Work item 10930 - Store calculated values in output by PHPExcel_Writer_Excel5
- Feature: (ET) Work item 10939 - Sheet protection options in Excel5 reader/writer
- Feature: (MBaker) Modification of the COUNT(), AVERAGE(), AVERAGEA(), DEVSQ, AVEDEV(), STDEV(), STDEVA(), STDEVP(), STDEVPA(), VARA() and VARPA() SKEW() and KURT() functions to correctly handle boolean values depending on whether they're passed in as values, values within a matrix or values within a range of cells.
- Feature: (ET) Work item 9932 - Cell range selection
- Feature: (MB) Work item 10266 - Root-relative path handling
- Feature: (ET) Work item 11315 - Named Ranges not working with PHPExcel_Writer_Excel5
- Bugfix: (MB) Work item 11206 - Excel2007 Reader fails to load Apache POI generated Excel
- Bugfix: (MB) Work item 11154 - Number format is broken when system's thousands separator is empty
- Bugfix: (MB) Work item 11401 - ReferenceHelper::updateNamedFormulas throws errors if oldName is empty
- Bugfix: (MB) Work item 11296 - parse_url() fails to parse path to an image in xlsx
- Bugfix: (ET) Work item 10876 - Workaround for iconv_substr() bug in PHP 5.2.0
- Bugfix: (ET) Work item 10877 - 1 pixel error for image width and height with PHPExcel_Writer_Excel5
- Bugfix: (MBaker) Fix to GEOMEAN() Statistical function
- Bugfix: (ET) Work item 10884 - setValue('-') and setValue('.') sets numeric 0 instead of 1-character string
- Bugfix: (ET) Work item 10885 - Row height sometimes much too low after read with PHPExcel_Reader_Excel5
- Bugfix: (ET) Work item 10888 - Diagonal border. Miscellaneous missing support.
                     - Constant PHPExcel_Style_Borders::DIAGONAL_BOTH added to support double-diagonal (cross)
                     - PHPExcel_Reader_Excel2007 not always reading diagonal borders (only recognizes 'true' and not '1')
                     - PHPExcel_Reader_Excel5 support for diagonal borders
                     - PHPExcel_Writer_Excel5 support for diagonal borders
- Bugfix: (ET) Work item 10894 - Session bug: Fatal error: Call to a member function bindValue() on a non-object in ...\Classes\PHPExcel\Cell.php on line 217
- Bugfix: (ET) Work item 10896 - Colors messed up saving twice with same instance of PHPExcel_Writer_Excel5 (regression since 1.7.0)
- Bugfix: (ET) Work item 10917 - Method PHPExcel_Worksheet::setDefaultStyle is not working
- Bugfix: (ET) Work item 10897 - PHPExcel_Reader_CSV::canRead() sometimes says false when it shouldn't
- Bugfix: (ET) Work item 10922 - Changes in workbook not picked up between two saves with PHPExcel_Writer_Excel2007
- Bugfix: (ET) Work item 10913 - Decimal and thousands separators missing in HTML and PDF output
- Bugfix: (ET) Work item 10936 - Notices with PHPExcel_Reader_Excel5 and named array constants
- Bugfix: (MBaker) Work item 10938 - Calculation engine limitation on 32-bit platform with integers > 2147483647
- Bugfix: (ET) Work item 10959 - Shared(?) formulae containing absolute cell references not read correctly using Excel5 Reader
- Bugfix: (MBaker) Work item 10962 - Warning messages with intersection operator involving single cell
- Bugfix: (ET) Work item 10980 - Infinite loop in Excel5 reader caused by zero-length string in SST
- Bugfix: (ET) Work item 10983 - Remove unnecessary cell sorting to improve speed by approx. 18% in HTML and PDF writers
- Bugfix: (MBaker) Work item 10977 - Cannot read A1 cell content - OO_Reader
- Bugfix: (ET) Work item 11000 - Transliteration failed, invalid encoding


2009/11/02 (v1.7.1):
- General: (ET) Work item 10687 - ereg() function deprecated in PHP 5.3.0
- General: (MB) Work item 10739 - Writer Interface Inconsequence - setTempDir and setUseDiskCaching
- General: (ET) Upgrade to TCPDF 4.8.009
- Feature: (ET) Work item 7333 - Support for row and column styles (feature request)
            - Basic implementation for Excel2007/Excel5 reader/writer
- Feature: (ET) Work item 10459 - Hyperlink to local file in Excel5 reader/writer
- Feature: (MB) Work item 10472 - Color Tab (Color Sheet's name)
- Feature: (ET) Work item 10488 - Border style "double" support in PHPExcel_Writer_HTML
- Feature: (ET) Work item 10492 - Multi-section number format support in HTML/PDF/CSV writers
- Feature: (MBaker) - Some additional performance tweaks in the calculation engine
- Feature: (MBaker) - Fix result of DB() and DDB() Financial functions to 2dp when in Gnumeric Compatibility mode
- Feature: (MBaker) - Added AMORDEGRC(), AMORLINC() and COUPNUM() Financial function (no validation of parameters yet)
- Feature: (MBaker) - Improved accuracy of TBILLEQ(), TBILLPRICE() and TBILLYIELD() Financial functions when in Excel or Gnumeric mode
- Feature: (MBaker) - Added INDIRECT() Lookup/Reference function (only supports full addresses at the moment)
- Feature: (MB) Work item 10498 - PHPExcel_Reader_CSV::canRead() improvements
- Feature: (ET) Work item 10500 - Input encoding option for PHPExcel_Reader_CSV
- Feature: (ET) Work item 10493 - Colored number format support, e.g. [Red], in HTML/PDF output
- Feature: (ET) Work item 10559 - Color Tab (Color Sheet's name) [Excel5 reader/writer support]
- Feature: (MBaker) Initial version of SYLK (slk) and Excel 2003 XML Readers (Cell data and basic cell formatting)
- Feature: (MBaker) Initial version of Open Office Calc (ods) Reader (Cell data only)
- Feature: (MBaker) Initial use of "pass by reference" in the calculation engine for ROW() and COLUMN() Lookup/Reference functions
- Feature: (MBaker) Work item 2346 - COLUMNS() and ROWS() Lookup/Reference functions, and SUBSTITUTE() Text function
- Feature: (ET) Work item 10502 - AdvancedValueBinder(): Re-enable zero-padded string-to-number conversion, e.g '0004' -> 4
- Feature: (ET) Work item 10600 - Make PHP type match Excel datatype
- Feature: (MB) Work item 10630 - Change first page number on header
- Feature: (MB) Applied patch 3941
- Feature: (MB,ET) Work item 10745 - Hidden sheets
- Feature: (ET) Work item 10761 - mbstring fallback when iconv is broken
- Feature: (MBaker) Added support for matrix/value comparisons (e.g. ={1,2;3,4}>=3 or 2<>{1,2;3,4}) - Note, can't yet handle comparison of two matrices
- Feature: (MBaker) Improved handling for validation and error trapping in a number of functions
- Feature: (MBaker) Improved support for fraction number formatting
- Feature: (ET) Work item 10455 - Support Reading CSV with Byte Order Mark (BOM)
- Feature: (ET) Work item 10860 - addExternalSheet() at specified index
- Bugfix: (MBaker) Work item 10684 - Named range can no longer be passed to worksheet->getCell()
- Bugfix: (ET) Work item 10455 - RichText HTML entities no longer working in PHPExcel 1.7.0
- Bugfix: (ET) Work item 7610 - Fit-to-width value of 1 is lost after read/write of Excel2007 spreadsheet [+ support for simultaneous scale/fitToPage]
- Bugfix: (MB) Work item 10469 - Performance issue identified by profiling
- Bugfix: (ET) Work item 10473 - setSelectedCell is wrong
- Bugfix: (ET) Work item 10481 - Images get squeezed/stretched with (Mac) Verdana 10 Excel files using Excel5 reader/writer
- Bugfix: (MBaker) Work item 10482 - Error in argument count for DATEDIF() function
- Bugfix: (MBaker) Work item 10452 - updateFormulaReferences is buggy
- Bugfix: (MB) Work item 10485 - CellIterator returns null Cell if onlyExistingCells is set and key() is in use
- Bugfix: (MBaker) Work item 10453 - Wrong RegEx for parsing cell references in formulas
- Bugfix: (MB) Work item 10486 - Optimisation subverted to devastating effect if IterateOnlyExistingCells is clear
- Bugfix: (ET) Work item 10494 - Fatal error: Uncaught exception 'Exception' with message 'Unrecognized token 6C in formula'... with PHPExcel_Reader_Excel5
- Bugfix: (MBaker) Work item 10490 - Fractions stored as text are not treated as numbers by PHPExcel's calculation engine
- Bugfix: (ET) Work item 10503 - AutoFit (autosize) row height not working in PHPExcel_Writer_Excel5
- Bugfix: (MBaker) Fixed problem with null values breaking the calculation stack
- Bugfix: (ET) Work item 10524 - Date number formats sometimes fail with PHPExcel_Style_NumberFormat::toFormattedString, e.g. [$-40047]mmmm d yyyy
- Bugfix: (MBaker) Fixed minor problem with DATEDIFF YM calculation
- Bugfix: (MB) Applied patch 3695
- Bugfix: (ET) Work item 10536 - setAutosize() and Date cells not working properly
- Bugfix: (ET) Work item 10556 - Time value hour offset in output by HTML/PDF/CSV writers (system timezone problem)
- Bugfix: (ET) Work item 10558 - Control characters 0x14-0x1F are not treated by PHPExcel
- Bugfix: (ET) Work item 10560 - PHPExcel_Writer_Excel5 not working when open_basedir restriction is in effect
- Bugfix: (MBaker) Work item 10563 - IF formula calculation problem in PHPExcel 1.7.0 (string comparisons)
- Bugfix: (MBaker) Improved CODE() Text function result for UTF-8 characters
- Bugfix: (ET) Work item 10568 - Empty rows are collapsed with HTML/PDF writer
- Bugfix: (ET) Work item 10569 - Gaps between rows in output by PHPExcel_Writer_PDF (Upgrading to TCPDF 4.7.003)
- Bugfix: (ET) Work item 10575 - Problem reading formulas (Excel5 reader problem with "fake" shared formulas)
- Bugfix: (MBaker) Work item 10588 - Error type in formula: "_raiseFormulaError message is Formula Error: An unexpected error occured"
- Bugfix: (ET) Work item 10599 - Miscellaneous column width problems in Excel5/Excel2007 writer
- Bugfix: (ET) Work item 10615 - Reader/Excel5 'Unrecognized token 2D in formula' in latest version
- Bugfix: (ET) Work item 10623 - on php 5.3 PHPExcel 1.7 Excel 5 reader fails in _getNextToken, token = 2C, throws exception
- Bugfix: (ET) Work item 10617 - Fatal error when altering styles after workbook has been saved
- Bugfix: (ET) Work item 10661 - Images vertically stretched or squeezed when default font size is changed (PHPExcel_Writer_Excel5)
- Bugfix: (ET) Work item 10676 - Styles not read in "manipulated" Excel2007 workbook
- Bugfix: (ET) Work item 10059 - Windows 7 says corrupt file by PHPExcel_Writer_Excel5 when opening in Excel
- Bugfix: (MBaker) Work item 10708 - Calculations sometimes not working with cell references to other sheets
- Bugfix: (ET) Work item 10706 - Problem with merged cells after insertNewRowBefore()
- Bugfix: (MBaker) Applied patch 4023
- Bugfix: (MBaker) Fix to SUMIF() and COUNTIF() Statistical functions for when condition is a match against a string value
- Bugfix: (ET) Work item 10721 - PHPExcel_Cell::coordinateFromString should throw exception for bad string parameter
- Bugfix: (ET) Work item 10723 - EucrosiaUPC (Thai font) not working with PHPExcel_Writer_Excel5
- Bugfix: (MBaker) Improved the return of calculated results when the result value is an array
- Bugfix: (MBaker) Allow calculation engine to support Functions prefixed with @ within formulae
- Bugfix: (MBaker) Work item 10632 - Intersection operator (space operator) fatal error with calculation engine
- Bugfix: (ET) Work item 10742 - Chinese, Japanese, Korean characters show as squares in PDF
- Bugfix: (ET) Work item 10756 - sheet title allows invalid characters
- Bugfix: (ET) Work item 10757 - Sheet!$A$1 as function argument in formula causes infinite loop in Excel5 writer
- Bugfix: (MBaker) Work item 10740 - Cell range involving name not working with calculation engine - Modified calculation parser to handle range operator (:), but doesn't currently handle worksheet references with spaces or other non-alphameric characters, or trap erroneous references
- Bugfix: (MBaker) Work item 10798 - DATE function problem with calculation engine (says too few arguments given)
- Bugfix: (MBaker) Work item 10799 - Blank cell can cause wrong calculated value
- Bugfix: (MBaker) Modified ROW() and COLUMN() Lookup/Reference Functions to return an array when passed a cell range, plus some additional work on INDEX()
- Bugfix: (ET) Work item 10817 - Images not showing in Excel 97 using PHPExcel_Writer_Excel5 (patch by Jordi Guti�rrez Hermoso)
- Bugfix: (ET) Work item 10785 - When figures are contained in the excel sheet, Reader was stopped
- Bugfix: (MBaker) Work item 10818 - Formulas changed after insertNewRowBefore()
- Bugfix: (ET) Work item 10825 - Cell range row offset problem with shared formulas using PHPExcel_Reader_Excel5
- Bugfix: (MBaker) Work item 10832 - Warning: Call-time pass-by-reference has been deprecated
- Bugfix: (ET) Work item 10849 - Image should "Move but don't size with cells" instead of "Move and size with cells" with PHPExcel_Writer_Excel5
- Bugfix: (ET) Work item 10856 - Opening a Excel5 generated XLS in Excel 2007 results in header/footer entry not showing on input
- Bugfix: (ET) Work item 10859 - addExternalSheet() not returning worksheet
- Bugfix: (MBaker) Work item 10629 - Invalid results in formulas with named ranges


2009/08/10 (v1.7.0):
- General: (ET) Work item 9893 - Expand documentation: Number formats
- General: (ET) Work item 9941 - Class 'PHPExcel_Cell_AdvancedValueBinder' not found
- General: (MB) Work item 9960 - Change return type of date functions to PHPExcel_Calculation_Functions::RETURNDATE_EXCEL
- Feature: (MBaker) - New RPN and stack-based calculation engine for improved performance of formula calculation
            - Faster (anything between 2 and 12 times faster than the old parser, depending on the complexity and nature of the formula)
            - Significantly more memory efficient when formulae reference cells across worksheets
            - Correct behaviour when referencing Named Ranges that exist on several worksheets
            - Support for Excel ^ (Exponential) and % (Percentage) operators
            - Support for matrices within basic arithmetic formulae (e.g. ={1,2,3;4,5,6;7,8,9}/2)
            - Better trapping/handling of NaN and infinity results (return #NUM! error)
            - Improved handling of empty parameters for Excel functions
            - Optional logging of calculation steps
- Feature: (MBaker) - New calculation engine can be accessed independently of workbooks (for use as a standalone calculator)
- Feature: (MBaker) Work Item 2346 - Implement more Excel calculation functions
            - Initial implementation of the COUNTIF() and SUMIF() Statistical functions
            - Added ACCRINT() Financial function
- Feature: (MBaker) - Modifications to number format handling for dddd and ddd masks in dates, use of thousand separators even when locale only implements it for money, and basic fraction masks (0 ?/? and ?/?)
- Feature: (ET) Work item 9794 - Support arbitrary fixed number of decimals in PHPExcel_Style_NumberFormat::toFormattedString()
- Feature: (ET) Work item 6857 - Improving performance and memory on data dumps
            - Various style optimizations (merging from branch wi6857-memory)
            - Moving hyperlink and dataValidation properties from cell to worksheet for lower PHP memory usage
- Feature: (MB) Work item 9869 - Provide fluent interfaces where possible
- Feature: (ET) Work item 9899 - Make easy way to apply a border to a rectangular selection
- Feature: (ET) Work item 9906 - Support for system window colors in PHPExcel_Reader_Excel5
- Feature: (ET) Work item 9911 - Horizontal center across selection
- Feature: (ET) Work item 9919 - Merged cells record, write to full record size in PHPExcel_Writer_Excel5
- Feature: (MB) Work item 9895 - Add page break between sheets in exported PDF
- Feature: (ET) Work item 9902 - Sanitization of UTF-8 input for cell values
- Feature: (ET) Work item 9930 - Read cached calculated value with PHPExcel_Reader_Excel5
- Feature: (ET) Work item 9896 - Miscellaneous CSS improvements for PHPExcel_Writer_HTML
- Feature: (ET) Work item 9947 - getProperties: setCompany feature request
- Feature: (MB) Patch 2981 - Insert worksheet at a specified index
- Feature: (MB) Patch 3018 - Change worksheet index
- Feature: (MB) Patch 3039 - Readfilter for CSV reader
- Feature: (ET) Work item 10172 - Check value of mbstring.func_overload when saving with PHPExcel_Writer_Excel5
- Feature: (ET) Work item 10251 - Eliminate dependency of an include path pointing to class directory
- Feature: (ET) Work item 10292 - Method for getting the correct reader for a certain file (contribution)
- Feature: (ET) Work item 10287 - Choosing specific row in fromArray method
- Feature: (ET) Work item 10319 - Shared formula support in PHPExcel_Reader_Excel5
- Feature: (MB,ET) Work item 10345 - Right-to-left column direction in worksheet
- Bugfix: (ET) Work item 9824 - PHPExcel_Reader_Excel5 not reading PHPExcel_Style_NumberFormat::FORMAT_NUMBER ('0')
- Bugfix: (ET) Work item 9858 - Fractional row height in locale other than English results in corrupt output using PHPExcel_Writer_Excel2007
- Bugfix: (ET) Work item 9846 - Fractional (decimal) numbers not inserted correctly when locale is other than English
- Bugfix: (ET) Work item 9863 - Fractional calculated value in locale other than English results in corrupt output using PHPExcel_Writer_Excel2007
- Bugfix: (ET) Work item 9830 - Locale aware decimal and thousands separator in exported formats HTML, CSV, PDF
- Bugfix: (MB) Work item 9819 - Cannot Add Image with Space on its Name
- Bugfix: (ET) Work item 9884 - Black line at top of every page in output by PHPExcel_Writer_PDF
- Bugfix: (ET) Work item 9885 - Border styles and border colors not showing in HTML output (regression since 1.6.4)
- Bugfix: (ET) Work item 9888 - Hidden screen gridlines setting in worksheet not read by PHPExcel_Reader_Excel2007
- Bugfix: (MB) Work item 9913 - Some valid sheet names causes corrupt output using PHPExcel_Writer_Excel2007
- Bugfix: (ET) Work item 9934 - More than 32,767 characters in a cell gives corrupt Excel file
- Bugfix: (ET) Work item 9937 - Images not getting copyied with the ->copy() function
- Bugfix: (ET) Work item 9940 - Bad calculation of column width setAutoSize(true) function
- Bugfix: (ET) Work item 9968 - Dates are sometimes offset by 1 day in output by HTML and PDF writers depending on system timezone setting
- Bugfix: (ET) Work item 10003 - Wingdings symbol fonts not working with PHPExcel_Writer_Excel5
- Bugfix: (MB) Work item 10010 - White space string prefix stripped by PHPExcel_Writer_Excel2007
- Bugfix: (ET) Work item 10023 - The name of the Workbook stream MUST be "Workbook", not "Book"
- Bugfix: (ET) Work item 10030 - Avoid message "Microsoft Excel recalculates formulas..." when closing xls file from Excel
- Bugfix: (ET) Work item 10031 - Non-unique newline representation causes problems with LEN formula
- Bugfix: (ET) Work item 10033 - Newline in cell not showing with PHPExcel_Writer_HTML and PHPExcel_Writer_PDF
- Bugfix: (ET) Work item 10046 - Rich-Text strings get prefixed by &nbsp; when output by HTML writer
- Bugfix: (ET) Work item 10052 - Leading spaces do not appear in output by HTML/PDF writers
- Bugfix: (MB) Work item 10061 - Empty Apache POI-generated file can not be read
- Bugfix: (ET) Work item 10068 - Column width not scaling correctly with font size in HTML and PDF writers
- Bugfix: (ET) Work item 10069 - Inaccurate row heights with HTML writer
- Bugfix: (MB) Patch 2992 - Reference helper
- Bugfix: (MBaker) - Excel 5 Named ranges should not be local to the worksheet, but accessible from all worksheets
- Bugfix: (ET) Work item 10088 - Row heights are ignored by PHPExcel_Writer_PDF
- Bugfix: (MB) Patch 3003 - Write raw XML
- Bugfix: (ET) Work item 10098 - removeRow(), removeColumn() not always clearing cell values
- Bugfix: (ET) Work item 10142 - Problem reading certain hyperlink records with PHPExcel_Reader_Excel5
- Bugfix: (ET) Work item 10143 - Hyperlink cell range read failure with PHPExcel_Reader_Excel2007
- Bugfix: (MB) Work item 10149 - 'Column string index can not be empty.'
- Bugfix: (ET) Work item 10204 - getHighestColumn() sometimes says there are 256 columns with PHPExcel_Reader_Excel5
- Bugfix: (ET) Work item 10220 - extractSheetTitle fails when sheet title contains exclamation mark (!)
- Bugfix: (ET) Work item 10221 - setTitle() sometimes erroneously appends integer to sheet name
- Bugfix: (ET) Work item 10229 - Mac BIFF5 Excel file read failure (missing support for Mac OS Roman character set)
- Bugfix: (ET) Work item 10230 - BIFF5 header and footer incorrectly read by PHPExcel_Reader_Excel5
- Bugfix: (ET) Work item 10259 - iconv notices when reading hyperlinks with PHPExcel_Reader_Excel5
- Bugfix: (ET) Work item 10252 - Excel5 reader OLE read failure with small Mac BIFF5 Excel files
- Bugfix: (ET) Work item 10272 - Problem in reading formula : IF( IF ) with PHPExcel_Reader_Excel5
- Bugfix: (ET) Work item 10274 - Error reading formulas referencing external sheets with PHPExcel_Reader_Excel5
- Bugfix: (ET) Work item 10291 - Image horizontally stretched when default font size is increased (PHPExcel_Writer_Excel5)
- Bugfix: (ET) Work item 10333 - Undefined offset in Reader\Excel5.php on line 3572
- Bugfix: (MB) Work item 10340 - PDF output different then XLS (copied data)
- Bugfix: (ET) Work item 10352 - Internal hyperlinks with UTF-8 sheet names not working in PHPExcel_Writer_Excel5
- Bugfix: (ET) Work item 10361 - String shared formula result read error with PHPExcel_Reader_Excel5
- Bugfix: (ET) Work item 10363 - Uncaught exception 'Exception' with message 'Valid scale is between 10 and 400.' in Classes/PHPExcel/Worksheet/PageSetup.php:338
- Bugfix: (ET) Work item 10355 - Using setLoadSheetsOnly fails if you do not use setReadDataOnly(true) and sheet is not the first sheet
- Bugfix: (MB) Work item 10362 - getCalculatedValue() sometimes incorrect with IF formula and 0-values
- Bugfix: (MBaker) Work Item 10198 - Excel Reader 2007 problem with "shared" formulae when "master" is an error
- Bugfix: (MBaker) Work Item 10106 - Named Range Bug, using the same range name on different worksheets
- Bugfix: (MBaker) Work Item 10004 - Java code in JAMA classes
- Bugfix: (MBaker) Work Item 9659 - getCalculatedValue() not working with some formulas involving error types
- Bugfix: (MBaker) Work Item 9447 - evaluation of both return values in an IF() statement returning an error if either result was an error, irrespective of the IF evaluation
- Bugfix: (MBaker) Work Item 6203 - Power in formulas: new calculation engine no longer treats ^ as a bitwise XOR operator
- Bugfix: (MBaker) - Bugfixes and improvements to many of the Excel functions in PHPExcel
            - Added optional "places" parameter in the BIN2HEX(), BIN2OCT, DEC2BIN(), DEC2OCT(), DEC2HEX(), HEX2BIN(), HEX2OCT(), OCT2BIN() and OCT2HEX() Engineering Functions
            - Trap for unbalanced matrix sizes in MDETERM() and MINVERSE() Mathematic and Trigonometric functions
            - Fix for default characters parameter value for LEFT() and RIGHT() Text functions
            - Fix for GCD() and LCB() Mathematical functions when the parameters include a zero (0) value
            - Fix for BIN2OCT() Engineering Function for 2s complement values (which were returning hex values)
            - Fix for BESSELK() and BESSELY() Engineering functions
            - Fix for IMDIV() Engineering Function when result imaginary component is positive (wasn't setting the sign)
            - Fix for ERF() Engineering Function when called with an upper limit value for the integration
            - Fix to DATE() Date/Time Function for year value of 0
            - Set ISPMT() function as category FINANCIAL
            - Fix for DOLLARDE() and DOLLARFR() Financial functions
            - Fix to EFFECT() Financial function (treating $nominal_rate value as a variable name rather than a value)
            - Fix to CRITBINOM() Statistical function (CurrentValue and EssentiallyZero treated as constants rather than variables)
                     Note that an Error in the function logic can still lead to a permanent loop
            - Fix to MOD() Mathematical function to work with floating point results
            - Fix for QUOTIENT() Mathematical function
            - Fix to HOUR(), MINUTE() and SECOND() Date/Time functions to return an error when passing in a floating point value of 1.0 or greater, or less than 0
            - LOG() Function now correctly returns base-10 log when called with only one parameter, rather than the natural log as the default base
            - Modified text functions to handle multibyte character set (UTF-8).


2009/04/22 (v1.6.7):
- General: (MB) Work item 9416 - Deprecate misspelled setStriketrough() and getStriketrough() methods
- General: (MB) Work item 9526 - Performance improvement when saving file
- Feature: (MB) Work item 9598 - Check that sheet title has maximum 31 characters
- Feature: (MB, ET) Work item 9631 - True support for Excel built-in number format codes
- Feature: (ET) Work item 9683 - Ability to read defect BIFF5 Excel file without CODEPAGE record
- Feature: (MB) Work item 9701 - Auto-detect which reader to invoke
- Feature: (ET) Work item 9214 - Deprecate insertion of dates using PHP-time (Unix time) [request for removal of feature]
- Feature: (ET) Work item 9747 - Support for entering time values like '9:45', '09:45' using AdvancedValueBinder
- Feature: (ET) Work item 9797 - DataType dependent horizontal alignment in HTML and PDF writer
- Bugfix: (MB) Work item 9375 - Cloning data validation object causes script to stop
- Bugfix: (ET) Work item 9400 - Simultaneous repeating rows and repeating columns not working with PHPExcel_Writer_Excel5
- Bugfix: (MB) Work item 9399 - Simultaneous repeating rows and repeating columns not working with PHPExcel_Writer_Excel2007
- Bugfix: (ET) Work item 9437 - Row outline level not working with PHPExcel_Writer_Excel5
- Bugfix: (ET) Work item 9452 - Occasional notices with PHPExcel_Reader_Excel5 when Excel file contains drawing elements
- Bugfix: (ET) Work item 9453 - PHPExcel_Reader_Excel5 fails as a whole when workbook contains images other than JPEG/PNG
- Bugfix: (ET) Work item 9444 - Excel5 writer checks for iconv but does not necessarily use it
- Bugfix: (ET) Work item 9463 - Altering a style on copied worksheet alters also the original
- Bugfix: (MB) Work item 9480 - Formulas are incorrectly updated when a sheet is renamed
- Bugfix: (MB) Work item 9513 - PHPExcel_Worksheet::extractSheetTitle not treating single quotes correctly
- Bugfix: (MB) Work item 9477 - PHP Warning raised in function array_key_exists
- Bugfix: (MB) Work item 9599 - getAlignWithMargins() gives wrong value when using PHPExcel_Reader_Excel2007
- Bugfix: (MB) Work item 9600 - getScaleWithDocument() gives wrong value when using PHPExcel_Reader_Excel2007
- Bugfix: (MB) Work item 9630 - PHPExcel_Reader_Excel2007 not reading the first user-defined number format
- Bugfix: (MB) Work item 9647 - Print area converted to uppercase after read with PHPExcel_Reader_Excel2007
- Bugfix: (MB) Work item 9661 - Incorrect reading of scope for named range using PHPExcel_Reader_Excel2007
- Bugfix: (MB) Work item 9690 - Error with pattern (getFillType) and rbg (getRGB)
- Bugfix: (ET) Work item 9712 - AdvancedValueBinder affected by system timezone setting when inserting date values
- Bugfix: (ET) Work item 9743 - PHPExcel_Reader_Excel2007 not reading value of active sheet index
- Bugfix: (ET) Work item 9742 - getARGB() sometimes returns SimpleXMLElement object instead of string with PHPExcel_Reader_Excel2007
- Bugfix: (ET) Work item 9731 - Negative image offset causes defects in 14excel5.xls and 20readexcel5.xlsx
- Bugfix: (ET) Work item 9758 - HTML & PDF Writer not working with mergeCells (regression since 1.6.5)
- Bugfix: (ET) Work item 9774 - Too wide columns with HTML and PDF writer
- Bugfix: (MB) Work item 9775 - PDF and cyrillic fonts
- Bugfix: (ET) Work item 9793 - Percentages not working correctly with HTML and PDF writers (shows 0.25% instead of 25%)
- Bugfix: (ET) Work item 9791 - PHPExcel_Writer_HTML creates extra borders around cell contents using setUseInlineCss(true)
- Bugfix: (ET) Work item 9784 - Problem with text wrap + merged cells in HTML and PDF writer
- Bugfix: (ET) Work item 9814 - Adjacent path separators in include_path causing IOFactory to violate open_basedir restriction


--------------------------------------------------------------------------------
BREAKING CHANGE! In previous versions of PHPExcel up to and including 1.6.6,
when a cell had a date-like number format code, it was possible to enter a date
directly using an integer PHP-time without converting to Excel date format.

Starting with PHPExcel 1.6.7 this is no longer supported. Refer to the developer
documentation for more information on entering dates into a cell.
--------------------------------------------------------------------------------


2009/03/02 (v1.6.6):
- General: (MB) Work item 9102 - Improve support for built-in number formats in PHPExcel_Reader_Excel2007
- General: (ET) Work item 9281 - Source files are in both UNIX and DOS formats - changed to UNIX
- General: (MB) Work item 9338 - Update documentation: Which language to write formulas in?
- Feature: (ET) Work item 8817 - Ignore DEFCOLWIDTH records with value 8 in PHPExcel_Reader_Excel5
- Feature: (ET) Work item 8847 - Support for width, height, offsetX, offsetY for images in PHPExcel_Reader_Excel5
- Feature: (MB) Work item 8870 - Disk Caching in specific folder
- Feature: (MBaker) Work item 2346 - Added SUMX2MY2, SUMX2PY2, SUMXMY2, MDETERM and MINVERSE Mathematical and Trigonometric Functions
- Feature: (MBaker) Work item 2346 - Added CONVERT Engineering Function
- Feature: (MBaker) Work item 2346 - Added DB, DDB, DISC, DOLLARDE, DOLLARFR, INTRATE, IPMT, PPMT, PRICEDISC, PRICEMAT and RECEIVED Financial Functions
- Feature: (MBaker) Work item 2346 - Added ACCRINTM, CUMIPMT, CUMPRINC, TBILLEQ, TBILLPRICE, TBILLYIELD, YIELDDISC and YIELDMAT Financial Functions
- Feature: (MBaker) Work item 2346 - Added DOLLAR Text Function
- Feature: (MBaker) Work item 2346 - Added CORREL, COVAR, FORECAST, INTERCEPT, RSQ, SLOPE and STEYX Statistical Functions
- Feature: (MBaker) Work item 2346 - Added PEARSON Statistical Functions as a synonym for CORREL
- Feature: (MBaker) Work item 2346 - Added LINEST, LOGEST (currently only valid for stats = false), TREND and GROWTH Statistical Functions
- Feature: (MBaker) Work item 2346 - Added RANK and PERCENTRANK Statistical Functions
- Feature: (MBaker) Work item 2346 - Added ROMAN Mathematical Function (Classic form only)
- Feature: (MB) Work item 8931 - Update documentation to show example of getCellByColumnAndRow($col, $row)
- Feature: (MB) Work item 8770 - Implement worksheet, row and cell iterators
- Feature: (MB) Work item 9001 - Support for arbitrary defined names (named range)
- Feature: (MB, ET) Work item 9016 - Update formulas when sheet title / named range title changes
- Feature: (MB) Work item 9103 - Ability to read cached calculated value
- Feature: (MBaker, ET) Work item 8483 - Support for Excel 1904 calendar date mode (Mac)
- Feature: (ET) Work item 9194 - PHPExcel_Writer_Excel5 improvements writing shared strings table
- Feature: (ET) Work item 9248 - PHPExcel_Writer_Excel5 iconv fallback when mbstring extension is not enabled
- Feature: (ET) Work item 9253 - UTF-8 support in font names in PHPExcel_Writer_Excel5
- Feature: (MB) Work item 9215 - Implement value binding architecture
- Feature: (MB) Work item 6742 - PDF writer not working with UTF-8
- Feature: (ET) Work item 9355 - Eliminate duplicate style entries in multisheet workbook written by PHPExcel_Writer_Excel5
- Bugfix: (ET) Work item 8810 - Redirect to client browser fails due to trailing white space in class definitions
- Bugfix: (MB) Work item 8816 - Spurious column dimension element introduced in blank worksheet after using PHPExcel_Writer_Excel2007
- Bugfix: (ET) Work item 8830 - Image gets slightly narrower than expected when using PHPExcel_Writer_Excel5
- Bugfix: (ET) Work item 8831 - Image laid over non-visible row gets squeezed in height when using PHPExcel_Writer_Excel5
- Bugfix: (ET) Work item 8860 - PHPExcel_Reader_Excel5 fails when there are 10 or more images in the workbook
- Bugfix: (MB) Work item 8909 - Different header/footer images in different sheets not working with PHPExcel_Writer_Excel2007
- Bugfix: (MB, ET) Work item 8924 - Fractional seconds disappear when using PHPExcel_Reader_Excel2007 and PHPExcel_Reader_Excel5
- Bugfix: (ET) Work item 7994 - Images not showing in OpenOffice when using PHPExcel_Writer_Excel5
- Bugfix: (ET) Work item 9047 - Images not showing on print using PHPExcel_Writer_Excel5
- Bugfix: (ET) Work item 9085 - PHPExcel_Writer_Excel5 maximum allowed record size 4 bytes too short
- Bugfix: (MB) Work item 9119 - Not numeric strings are formatted as dates and numbers using worksheet's toArray method
- Bugfix: (ET) Work item 9132 - Excel5 simple formula parsing error
- Bugfix: (ET) Work item 9206 - Problems writing dates with CSV
- Bugfix: (ET) Work item 9203 - PHPExcel_Reader_Excel5 reader fails with fatal error when reading group shapes
- Bugfix: (ET) Work item 9231 - PHPExcel_Writer_Excel5 fails completely when workbook contains more than 57 colors
- Bugfix: (ET) Work item 9244 - PHPExcel_Writer_PDF not compatible with autoload
- Bugfix: (ET) Work item 9250 - Fatal error: Call to a member function getNestingLevel() on a non-object in PHPExcel/Reader/Excel5.php on line 690
- Bugfix: (MB) Work item 9246 - Notices when running test 04printing.php on PHP 5.2.8
- Bugfix: (MB) Work item 9294 - insertColumn() spawns creation of spurious RowDimension
- BugFix: (MBaker) Work item 9296 - Fix declarations for methods in extended Trend classes
- Bugfix: (MBaker) Work item 2346 - Fix to parameters for the FORECAST Statistical Function
- Bugfix: (MB) Work item 7083 - PDF writer problems with cell height and text wrapping
- Bugfix: (MBaker) Work Item 9337 - Fix test for calculated value in case the returned result is an array
- Bugfix: (ET) Work Item 9354 - Column greater than 256 results in corrupt Excel file using PHPExcel_Writer_Excel5
- Bugfix: (MB) Work item 9351 - Excel Numberformat 0.00 results in non internal decimal places values in toArray() Method
- Bugfix: (MB,ET) Work item 9356 - setAutoSize not taking into account text rotation
- Bugfix: (ET) Work item 9372 - Call to undefined method PHPExcel_Worksheet_MemoryDrawing::getPath() in PHPExcel/Writer/HTML.php


2009/01/05 (v1.6.5):
- General: (MB) Applied patch 2063
- General: (MB) Applied patch from work item 8073 - Optimise Shared Strings
- General: (MB) Applied patch from work item 8074 - Optimise Cell Sorting
- General: (MB) Applied patch from work item 8075 - Optimise Style Hashing
- General: (ET) Applied patch from work item 8245 - UTF-8 enhancements
- General: (ET) Applied patch from work item 8283 - PHPExcel_Writer_HTML validation errors against strict HTML 4.01 / CSS 2.1
- General: (MB) Documented work items 6203 and 8110 in manual
- General: (ET) Restructure package hierachy so classes can be found more easily in auto-generated API (from work item 8468)
- General: (MB) Work item 8806 - Redirect output to a client's browser: Update recommendation in documentation
- Feature: (ET) Work item 7897 - PHPExcel_Reader_Excel5 support for print gridlines
- Feature: (ET) Work item 7899 - Screen gridlines support in Excel5 reader/writer
- Feature: (MB, ET) Work item 7552 - Option for adding image to spreadsheet from image resource in memory
- Feature: (ET) Work item 7862 - PHPExcel_Reader_Excel5 style support for BIFF5 files (Excel 5.0 - Excel 95)
- Feature: (ET) Work item 7918 - PHPExcel_Reader_Excel5 support for user-defined colors and special built-in colors
- Feature: (ET) Work item 7992 - Support for freeze panes in PHPExcel_Reader_Excel5
- Feature: (ET) Work item 7996 - Support for header and footer margins in PHPExcel_Reader_Excel5
- Feature: (ET) Work item 7997 - Support for active sheet index in Excel5 reader/writer
- Feature: (MB) Work item 7991 - Freeze panes not read by PHPExcel_Reader_Excel2007
- Feature: (MB, ET) Work item 7993 - Support for screen zoom level (feature request)
- Feature: (ET) Work item 8012 - Support for default style in PHPExcel_Reader_Excel5
- Feature: (MB) Work item 8094 - Apple iWork / Numbers.app incompatibility
- Feature: (MB) Work item 7931 - Support "between rule" in conditional formatting
- Feature: (MB) Work item 8308 - Comment size, width and height control (feature request)
- Feature: (ET) Work item 8418 - Improve method for storing MERGEDCELLS records in PHPExcel_Writer_Excel5
- Feature: (ET) Work item 8435 - Support for protectCells() in Excel5 reader/writer
- Feature: (ET) Work item 8472 - Support for fitToWidth and fitToHeight pagesetup properties in PHPExcel_Reader_Excel5
- Feature: (ET) Work item 8489 - Support for setShowSummaryBelow() and setShowSummaryRight() in PHPExcel_Writer_Excel5
- Feature: (MB) Work item 8483 - Support for Excel 1904 calendar date mode (Mac)
- Feature: (ET) Work item 7538 - Excel5 reader: Support for reading images (bitmaps)
- Feature: (ET) Work item 8787 - Support for default style in PHPExcel_Writer_Excel5
- Feature: (MBaker) Modified calculate() method to return either an array or the first value from the array for those functions that return arrays rather than single values (e.g the MMULT and TRANSPOSE function). This performance can be modified based on the $returnArrayAsType which can be set/retrieved by calling the setArrayReturnType() and getArrayReturnType() methods of the PHPExcel_Calculation class.
- Feature: (MBaker) Work item 2346 - Added ERROR.TYPE Information Function, MMULT Mathematical and Trigonometry Function, and TRANSPOSE Lookup and Reference Function
- Bugfix: (ET) Work item 7896 - setPrintGridlines(true) not working with PHPExcel_Writer_Excel5
- Bugfix: (ET) Work item 7907 - Incorrect mapping of fill patterns in PHPExcel_Writer_Excel5
- Bugfix: (MB) Work item 7898 - setShowGridlines(false) not working with PHPExcel_Writer_Excel2007
- Bugfix: (MB) Work item 7905 - getShowGridlines() gives inverted value when reading sheet with PHPExcel_Reader_Excel2007
- Bugfix: (ET) Work item 7944 - User-defined column width becomes slightly larger after read/write with Excel5
- Bugfix: (ET) Work item 7949 - Incomplete border style support in PHPExcel_Writer_Excel5
- Bugfix: (MB) Work item 7928 - Conditional formatting "containsText" read/write results in MS Office Excel 2007 crash
- Bugfix: (MB) Work item 7995 - All sheets are always selected in output when using PHPExcel_Writer_Excel2007
- Bugfix: (MB) Work item 8013 - COLUMN function warning message during plain read/write
- Bugfix: (MB) Work item 8155 - setValue(0) results in string data type '0'
- Bugfix: (MB) Work item 8226 - Styles not removed when removing rows from sheet
- Bugfix: (MB) Work item 8301 - =IF formula causes fatal error during $objWriter->save() in Excel2007 format
- Bugfix: (ET) Work item 8333 - Exception thrown reading valid xls file: "Excel file is corrupt. Didn't find CONTINUE record while reading shared strings"
- Bugfix: (ET) Work item 8320 - MS Outlook corrupts files generated by PHPExcel_Writer_Excel5
- Bugfix: (MB) Work item 8351 - Undefined method PHPExcel_Worksheet::setFreezePane() in ReferenceHelper.php on line 271
- Bugfix: (MB) Work item 8401 - Ampersands (&), left and right angles (<, >) in Rich-Text strings leads to corrupt output using PHPExcel_Writer_Excel2007
- Bugfix: (ET) Work item 8408 - Print header and footer not supporting UTF-8 in PHPExcel_Writer_Excel5
- Bugfix: (ET) Work item 8463 - Vertical page breaks not working with PHPExcel_Writer_Excel5
- Bugfix: (ET) Work item 8476 - Missing support for accounting underline types in PHPExcel_Writer_Excel5
- Bugfix: (ET) Work item 8482 - Infinite loops when reading corrupt xls file using PHPExcel_Reader_Excel5
- Bugfix: (ET) Work item 8566 - Sheet protection password not working with PHPExcel_Writer_Excel5
- Bugfix: (ET) Work item 8596 - PHPExcel_Style_NumberFormat::FORMAT_NUMBER ignored by PHPExcel_Writer_Excel5
- Bugfix: (ET) Work item 8781 - PHPExcel_Reader_Excel5 fails a whole when workbook contains a chart
- Bugfix: (ET) Work item 8788 - Occasional loss of column widths using PHPExcel_Writer_Excel5
- Bugfix: (ET) Work item 8795 - Notices while reading formulas with deleted sheet references using PHPExcel_Reader_Excel5
- Bugfix: (MB) Work item 8807 - Default style not read by PHPExcel_Reader_Excel2007
- Bugfix: (MB) Work item 9341 - Blank rows occupy too much space in file generated by PHPExcel_Writer_Excel2007


2008/10/27 (v1.6.4):
- General: (ET) Work item 7882 - RK record number error in MS developer documentation: 0x007E should be 0x027E
- Feature: (MBaker) Work item 7878 - getHighestColumn() returning "@" for blank worksheet causes corrupt output
- Feature: (MBaker) Work item 2346 - Implement ROW and COLUMN Lookup/Reference Functions (when specified with a parameter)
- Feature: (MBaker) Work item 2346 - Implement initial work on OFFSET Lookup/Reference Function (returning address rather than value at address)
- Feature: (ET) Work item 7416 - Excel5 reader: Page margins
- Feature: (ET) Work item 7417 - Excel5 reader: Header & Footer
- Feature: (ET) Work item 7449 - Excel5 reader support for page setup (paper size etc.)
- Feature: (MB) Work item 7445 - Improve speed and memory consumption of PHPExcel_Writer_CSV
- Feature: (MB) Work item 7432 - Better recognition of number format in HTML, CSV, and PDF writer
- Feature: (MB) Work item 7485 - Font support: Superscript and Subscript
- Feature: (ET) Work item 7509 - Excel5 reader font support: Super- and subscript
- Feature: (ET) Work item 7521 - Excel5 reader style support: Text rotation and stacked text
- Feature: (ET) Work item 7530 - Excel5 reader: Support for hyperlinks
- Feature: (MB, ET) Work item 7557 - Import sheet by request
- Feature: (ET) Work item 7607 - PHPExcel_Reader_Excel5 support for page breaks
- Feature: (ET) Work item 7622 - PHPExcel_Reader_Excel5 support for shrink-to-fit
- Feature: (MB, ET) Work item 7675 - Support for error types
- Feature: (ET) Work item 7388 - Excel5 reader true formula support
- Feature: (ET) Work item 7701 - Support for named ranges (defined names) in PHPExcel_Reader_Excel5
- Feature: (ET) Work item 7781 - Support for repeating rows and repeating columns (print titles) in PHPExcel_Reader_Excel5
- Feature: (ET) Work item 7783 - Support for print area in PHPExcel_Reader_Excel5
- Feature: (ET) Work item 7795 - Excel5 reader and writer support for horizontal and vertical centering of page
- Feature: (MB) Applied patch 1962
- Feature: (ET) Work item 7866 - Excel5 reader and writer support for hidden cells (formulas)
- Feature: (MB, ET) Work item 7612 - Support for indentation in cells (feature request)
- Feature: (MB, ET) Work item 7828 - Option for reading only specified interval of rows in a sheet
- Bugfix: (MBaker) Work item 7367 - PHPExcel_Calculation_Functions::DATETIMENOW() and PHPExcel_Calculation_Functions::DATENOW() to force UTC
- Bugfix: (MBaker) Work item 7395 - Modified PHPExcel_Shared_Date::FormattedPHPToExcel() and PHPExcel_Shared_Date::ExcelToPHP to force datatype for return values
- Bugfix: (ET) Work item 7450 - Excel5 reader not producing UTF-8 strings with BIFF5 files
- Bugfix: (MB) Work item 7470 - Array constant in formula gives run-time notice with Excel2007 writer
- Bugfix: (MB) Work item 7494 - PHPExcel_Reader_Excel2007 setReadDataOnly(true) returns Rich-Text
- Bugfix: (ET) Work item 7496 - PHPExcel_Reader_Excel5 setReadDataOnly(true) returns Rich-Text
- Bugfix: (MB) Work item 7497 - Characters before superscript or subscript losing style
- Bugfix: (MB) Work item 7507 - Subscript not working with HTML writer
- Bugfix: (MB) Work item 7508 - DefaultColumnDimension not working on first column (A)
- Bugfix: (MB) Work item 7527 - Negative numbers are stored as text in PHPExcel_Writer_2007
- Bugfix: (ET) Work item 7531 - Text rotation and stacked text not working with PHPExcel_Writer_Excel5
- Bugfix: (MB) Work item 7536 - PHPExcel_Shared_Date::isDateTimeFormatCode erroneously says true
- Bugfix: (MB) Work item 7559 - Different images with same filename in separate directories become duplicates
- Bugfix: (ET) Work item 7568 - PHPExcel_Reader_Excel5 not returning sheet names as UTF-8 using for Excel 95 files
- Bugfix: (MB) Work item 7575 - setAutoSize(true) on empty column gives column width of 10 using PHPExcel_Writer_Excel2007
- Bugfix: (MB, ET) Work item 7573 - setAutoSize(true) on empty column gives column width of 255 using PHPExcel_Writer_Excel5
- Bugfix: (MB) Work item 7514 - Worksheet_Drawing bug
- Bugfix: (MB) Work item 7593 - getCalculatedValue() with REPT function causes script to stop
- Bugfix: (MB) Work item 7594 - getCalculatedValue() with LEN function causes script to stop
- Bugfix: (MB) Work item 7600 - Explicit fit-to-width (page setup) results in fit-to-height becoming 1
- Bugfix: (MB) Work item 7610 - Fit-to-width value of 1 is lost after read/write of Excel2007 spreadsheet
- Bugfix: (MB) Work item 7516 - Conditional styles not read properly using PHPExcel_Reader_Excel2007
- Bugfix: (MB) Work item 7611 - PHPExcel_Writer_2007: Default worksheet style works only for first sheet
- Bugfix: (ET) Work item 6940 - Cannot Lock Cells using PHPExcel_Writer_Excel5
- Bugfix: (ET) Work item 7621 - Incorrect cell protection values found when using Excel5 reader
- Bugfix: (ET) Work item 7623 - Default row height not working above highest row using PHPExcel_Writer_Excel5
- Bugfix: (ET) Work item 7637 - Default column width does not get applied when using PHPExcel_Writer_Excel5
- Bugfix: (ET) Work item 7642 - Broken support for UTF-8 string formula results in PHPExcel_Reader_Excel5
- Bugfix: (ET) Work item 7643 - UTF-8 sheet names not working with PHPExcel_Writer_Excel5
- Bugfix: (MB) Work item 7631 - getCalculatedValue() with ISNONTEXT function causes script to stop
- Bugfix: (ET) Work item 7652 - Missing BIFF3 functions in PHPExcel_Writer_Excel5: USDOLLAR (YEN), FINDB, SEARCHB, REPLACEB, LEFTB, RIGHTB, MIDB, LENB, ASC, DBCS (JIS)
- Bugfix: (ET) Work item 7663 - Excel5 reader doesn't read numbers correctly in 64-bit systems
- Bugfix: (ET) Work item 7667 - Missing BIFF5 functions in PHPExcel_Writer_Excel5: ISPMT, DATEDIF, DATESTRING, NUMBERSTRING
- Bugfix: (ET) Work item 7668 - Missing BIFF8 functions in PHPExcel_Writer_Excel5: GETPIVOTDATA, HYPERLINK, PHONETIC, AVERAGEA, MAXA, MINA, STDEVPA, VARPA, STDEVA, VARA
- Bugfix: (MB) Work item 7657 - Wrong host value in PHPExcel_Shared_ZipStreamWrapper::stream_open()
- Bugfix: (ET) Work item 7676 - PHPExcel_Reader_Excel5 not reading explicitly entered error types in cells
- Bugfix: (ET) Work item 7678 - Boolean and error data types not preserved for formula results in PHPExcel_Reader_Excel5
- Bugfix: (MB) Work item 7695 - PHPExcel_Reader_Excel2007 ignores cell data type
- Bugfix: (ET) Work item 7712 - PHPExcel_Reader_Excel5 ignores cell data type
- Bugfix: (ET) Work item 7587 - PHPExcel_Writer_Excel5 not aware of data type
- Bugfix: (ET) Work item 7713 - Long strings sometimes truncated when using PHPExcel_Reader_Excel5
- Bugfix: (ET) Work item 7727 - Direct entry of boolean or error type in cell not supported by PHPExcel_Writer_Excel5
- Bugfix: (MB) Work item 7714 - PHPExcel_Reader_Excel2007: Error reading cell with data type string, date number format, and numeric-like cell value
- Bugfix: (ET) Work item 7735 - Row and column outlines (group indent level) not showing after using PHPExcel_Writer_Excel5
- Bugfix: (ET) Work item 7737 - Missing UTF-8 support in number format codes for PHPExcel_Writer_Excel5
- Bugfix: (ET) Work item 7750 - Missing UTF-8 support with PHPExcel_Writer_Excel5 for explicit string in formula
- Bugfix: (MB) Work item 7726 - Problem with class constants in PHPExcel_Style_NumberFormat
- Bugfix: (ET) Work item 7758 - Sometimes errors with PHPExcel_Reader_Excel5 reading hyperlinks
- Bugfix: (ET) Work item 7759 - Hyperlink in cell always results in string data type when using PHPExcel_Writer_Excel5
- Bugfix: (ET) Work item 7771 - Excel file with blank sheet seen as broken in MS Office Excel 2007 when created by PHPExcel_Writer_Excel5
- Bugfix: (ET) Work item 7785 - PHPExcel_Reader_Excel5: Incorrect reading of formula with explicit string containing (escaped) double-quote
- Bugfix: (MB) Work item 7787 - getCalculatedValue() fails on formula with sheet name containing (escaped) single-quote
- Bugfix: (MB) Work item 7786 - getCalculatedValue() fails on formula with explicit string containing (escaped) double-quote
- Bugfix: (MB) Work item 7780 - Problems with simultaneous repeatRowsAtTop and repeatColumnsAtLeft using Excel2007 reader and writer
- Bugfix: (ET) Work item 7802 - PHPExcel_Reader_Excel5: Error reading formulas with sheet reference containing special characters
- Bugfix: (ET) Work item 7831 - Off-sheet references sheet!A1 not working with PHPExcel_Writer_Excel5
- Bugfix: (ET) Work item 7834 - Repeating rows/columns (print titles), print area not working with PHPExcel_Writer_Excel5
- Bugfix: (ET) Work item 7849 - Formula having datetime number format shows as text when using PHPExcel_Writer_Excel5
- Bugfix: (MBaker) Work item 7863 - Cannot set formula to hidden using applyFromArray()
- Bugfix: (MBaker) Work item 7805 - HTML/PDF Writers limited to 26 columns by calculateWorksheetDimension (erroneous comparison in getHighestColumn() method)
- Bugfix: (MB) Work item 7873 - Formula returning error type is lost when read by PHPExcel_Reader_Excel2007
- Bugfix: (ET) Work item 7883 - PHPExcel_Reader_Excel5: Cell style lost for last column in group of blank cells
- Bugfix: (MB) Work item 7886 - Column width sometimes collapses to auto size using Excel2007 reader/writer
- Bugfix: (MB) Work item 9343 - Data Validation Formula = 0 crashes Excel


2008/08/25 (v1.6.3):
- Bugfix: (MBaker) Work item 7367 - Modified PHPExcel_Shared_Date::PHPToExcel() to force UTC
- General: (MB) Applied patch 1629
- General: (MB) Applied patch 1644
- General: (MB) Work item 6485 - Implement repeatRow and repeatColumn in Excel5 writer
- General: (MB) Work item 6838 - Remove scene3d filter in Excel2007 drawing
- Feature: (MBaker) Work item 2346 - Implement CHOOSE and INDEX Lookup/Reference Functions
- Feature: (MBaker) Work item 2346 - Implement CLEAN Text Functions
- Feature: (MBaker) Work item 2346 - Implement YEARFRAC Date/Time Functions
- Feature: (MB) Work item 6508 - Implement 2 options for print/show gridlines
- Feature: (MB) Work item 7270 - Add VLOOKUP function (contribution)
- Feature: (MB) Work item 7182 - Implemented: ShrinkToFit
- Feature: (MB) Work item 7218 - Row heights not updated correctly when inserting new rows
- Feature: (MB) Work item 7157 - Copy worksheets within the same workbook
- Feature: (ET) Work item 7290 - Excel5 reader style support: horizontal and vertical alignment plus text wrap
- Feature: (ET) Work item 7294 - Excel5 reader support for merged cells
- Feature: (ET) Work item 7296 - Excel5 reader: Sheet Protection
- Feature: (ET) Work item 7297 - Excel5 reader: Password for sheet protection
- Feature: (ET) Work item 7299 - Excel5 reader: Column width
- Feature: (ET) Work item 7301 - Excel5 reader: Row height
- Feature: (ET) Work item 7304 - Excel5 reader: Font support
- Feature: (ET) Work item 7324 - Excel5 reader: support for locked cells
- Feature: (ET) Work item 7330 - Excel5 reader style support: Fill (background colors and patterns)
- Feature: (ET) Work item 7332 - Excel5 reader style support: Borders (style and color)
- Feature: (ET) Work item 7346 - Excel5 reader: Rich-Text support
- Feature: (MB) Work item 7313 - Read Excel built-in number formats with Excel 2007 reader
- Feature: (ET) Work item 7317 - Excel5 reader: Number format support
- Feature: (MB) Work item 7362 - Creating a copy of PHPExcel object
- Feature: (ET) Work item 7373 - Excel5 reader: support for row / column outline (group)
- Feature: (MB) Work item 7380 - Implement default row/column sizes
- Feature: (MB) Work item 7364 - Writer HTML - option to return styles and table separately
- Feature: (ET) Work item 7393 - Excel5 reader: Support for remaining built-in number formats
- Bugfix: (MBaker) Fixed rounding in HOUR MINUTE and SECOND Time functions, and improved performance for these
- Bugfix: (MBaker) Fix to TRIM function
- Bugfix: (MBaker) Fixed range validation in TIME Functions.php
- Bugfix: (MBaker) EDATE and EOMONTH functions now return date values based on the returnDateType flag
- Bugfix: (MBaker) Write date values that are the result of a calculation function correctly as Excel serialized dates rather than PHP serialized date values
- Bugfix: (MB) Work item 6690 - Excel2007 reader not always reading boolean correctly
- Bugfix: (MB) Work item 6275 - Columns above IZ
- Bugfix: (MB) Work item 6853 - Other locale than English causes Excel2007 writer to produce broken xlsx
- Bugfix: (MB) Work item 7061 - Typo: Number_fromat in NumberFormat.php
- Bugfix: (MB) Work item 6865 - Bug in Worksheet_BaseDrawing setWidth()
- Bugfix: (MB) Work item 6891 - PDF writer collapses column width for merged cells
- Bugfix: (MB) Work item 6867 - Issues with drawings filenames
- Bugfix: (MB) Work item 7073 - fromArray() local variable isn't defined
- Bugfix: (MB) Work item 7276 - PHPExcel_Writer_Excel5->setTempDir() not passed to all classes involved in writing to a file
- Bugfix: (MB) Work item 7277 - Excel5 reader not handling UTF-8 properly
- Bugfix: (MB) Work item 7327 - If you write a 0 value in cell, cell shows as empty
- Bugfix: (MB) Work item 7302 - Excel2007 writer: Row height ignored for empty rows
- Bugfix: (MB) Work item 7281 - Excel2007 (comments related error)
- Bugfix: (MB) Work item 7345 - Column width in other locale
- Bugfix: (MB) Work item 7347 - Excel2007 reader not reading underlined Rich-Text
- Bugfix: (ET) Work item 7357 - Excel5 reader converting booleans to strings
- Bugfix: (MB) Work item 7365 - Recursive Object Memory Leak
- Bugfix: (MB) Work item 7372 - Excel2007 writer ignoring row dimensions without cells
- Bugfix: (ET) Work item 7382 - Excel5 reader is converting formatted numbers / dates to strings


2008/06/23 (v1.6.2):
- General: (MB) Work item 6088 - Document style array values
- General: (MB) Applied patch 1195
- General: (MB) Work item 6178 - Redirecting output to a client�s web browser - http headers
- General: (MB) Work item 6187 - Improve worksheet garbage collection
- General: (MBaker) Functions that return date values can now be configured to return as Excel serialized date/time, PHP serialized date/time, or a PHP date/time object.
- General: (MBaker) Functions that explicitly accept dates as parameters now permit values as Excel serialized date/time, PHP serialized date/time, a valid date string, or a PHP date/time object.
- General: (MBaker) Implement ACOSH, ASINH and ATANH functions for those operating platforms/PHP versions that don't include these functions
- General: (MBaker) Implement ATAN2 logic reversing the arguments as per Excel
- General: (MBaker) Additional validation of parameters for COMBIN
- General: (MBaker) Fixed validation for CEILING and FLOOR when the value and significance parameters have different signs; and allowed default value of 1 or -1 for significance when in GNUMERIC compatibility mode
- Feature: (MBaker) Work item 2346 - Implement ADDRESS, ISLOGICAL, ISTEXT and ISNONTEXT functions
- Feature: (MBaker) Work item 2346 - Implement COMPLEX, IMAGINARY, IMREAL, IMARGUMENT, IMCONJUGATE, IMABS, IMSUB, IMDIV, IMSUM, IMPRODUCT, IMSQRT, IMEXP, IMLN, IMLOG10, IMLOG2, IMPOWER IMCOS and IMSIN Engineering functions
- Feature: (MBaker) Work item 2346 - Implement NETWORKDAYS and WORKDAY Date/Time functions
- Feature: (MB) Work item 6100 - Make cell column AAA available
- Feature: (MB) Work item 6095 - Mark particular cell as selected when opening Excel
- Feature: (MB) Work item 6120 - Multiple sheets in PDF and HTML
- Feature: (MB) Work item 6227 - Implement PHPExcel_ReaderFactory and PHPExcel_WriterFactory
- Feature: (MB) Work item 6249 - Set image root of PHPExcel_Writer_HTML
- Feature: (MB) Work item 6264 - Enable/disable calculation cache
- Feature: (MB) Work item 6259 - PDF writer and multi-line text
- Feature: (MB) Work item 6350 - Feature request - setCacheExpirationTime()
- Feature: (JB) Work item 6370 - Implement late-binding mechanisms to reduce memory footprint
- Feature: (JB) Work item 6430 - Implement shared styles
- Feature: (MB) Work item 6391 - Copy sheet from external Workbook to active Workbook
- Feature: (MB) Work item 6428 - Functions in Conditional Formatting
- Bugfix: (MB) Work item 6096 - Default Style in Excel5
- Bugfix: (MB) Work item 6150 - Numbers starting with '+' cause Excel 2007 errors
- Bugfix: (MB) Work item 6092 - ExcelWriter5 is not PHP5 compatible, using it with E_STRICT results in a bunch of errors (applied patches)
- Bugfix: (MB) Work item 6179 - Error Reader Excel2007 line 653 foreach ($relsDrawing->Relationship as $ele)
- Bugfix: (MB) Work item 6229 - Worksheet toArray() screws up DATE
- Bugfix: (MB) Work item 6253 - References to a Richtext cell in a formula
- Bugfix: (MB) Work item 6285 - insertNewColumnBefore Bug
- Bugfix: (MB) Work item 6319 - Error reading Excel2007 file with shapes
- Bugfix: (MBaker) Work item 6302 - Determine whether date values need conversion from PHP dates to Excel dates before writing to file, based on the data type (float or integer)
- Bugfix: (MBaker) Fixes to DATE function when it is given negative input parameters
- Bugfix: (MB) Work item 6347 - PHPExcel handles empty cells other than Excel
- Bugfix: (MB) Work item 6348 - PHPExcel handles 0 and "" as being the same
- Bugfix: (MB) Work item 6357 - Problem Using Excel2007 Reader for Spreadsheets containing images
- Bugfix: (MB) Work item 6359 - ShowGridLines ignored when reading/writing Excel 2007
- Bugfix: (MB) Work item 6426 - Bug With Word Wrap in Excel 2007 Reader


2008/04/28 (v1.6.1):
- General: (MB) Work item 5532 - Fix documentation printing
- General: (MB) Work item 5586 - Memory usage improvements
- General: (MB) Applied patch 990
- General: (MB) Applied patch 991
- Feature: (BM) Work item 2841 - Implement PHPExcel_Reader_Excel5
- Feature: (MB) Work item 5564 - Implement "toArray" and "fromArray" method
- Feature: (MB) Work item 5665 - Read shared formula
- Feature: (MB) Work item 5681 - Read image twoCellAnchor
- Feature: (MB) Work item 4446 - &G Image as bg for headerfooter
- Feature: (MB) Work item 5834 - Implement page layout functionality for Excel5 format
- Feature: (MB) Work item 6039 - Feature request: PHPExcel_Writer_PDF
- Bugfix: (MB) Work item 5517 - DefinedNames null check
- Bugfix: (MB) Work item 5463 - Hyperlinks should not always have trailing slash
- Bugfix: (MB) Work item 5592 - Saving Error - Uncaught exception (#REF! named range)
- Bugfix: (MB) Work item 5634 - Error when creating Zip file on Linux System (Not Windows)
- Bugfix: (MB) Work item 5876 - Time incorrecly formated
- Bugfix: (MB) Work item 5914 - Conditional formatting - second rule not applied
- Bugfix: (MB) Work item 5978 - PHPExcel_Reader_Excel2007 cannot load PHPExcel_Shared_File
- Bugfix: (MB) Work item 6020 - Output redirection to web browser


2008/02/14 (v1.6.0):
- General: (MB) Work item 3156 - Use PHPExcel datatypes in formula calculation
- Feature: (MB) Work item 5019 - Center on page when printing
- Feature: (MB) Work item 5099 - Hyperlink to other spreadsheet
- Feature: (MB) Work item 5104 - Set the print area of a worksheet
- Feature: (MB) Work item 5118 - Read "definedNames" property of worksheet
- Feature: (MB) Work item 5338 - Set default style for all cells
- Feature: (MB) Work item 4216 - Named Ranges
- Feature: (MB) Work item 5398 - Implement worksheet references (Sheet1!A1)
- Bugfix: (MB) Work item 4967 - Redirect output to a client's web browser
- Bugfix: (MB) Work item 5008 - "File Error: data may have been lost." seen in Excel 2007 and Excel 2003 SP3 when opening XLS file
- Bugfix: (MB) Work item 5165 - Bug in style's getHashCode()
- Bugfix: (MB) Work item 5165 - PHPExcel_Reader not correctly reading numeric values
- Bugfix: (MB) Work item 5324 - Text rotation is read incorrectly
- Bugfix: (MB) Work item 5326 - Enclosure " and data " result a bad data : \" instead of ""
- Bugfix: (MB) Work item 5332 - Formula parser - IF statement returning array instead of scalar
- Bugfix: (MB) Work item 5351 - setFitToWidth(nbpage) & setFitToWidth(nbpage) work partially
- Bugfix: (MB) Work item 5361 - Worksheet::setTitle() causes unwanted renaming
- Bugfix: (MB) Work item 5407 - Hyperlinks not working. Results in broken xlsx file.


2007/12/24 (v1.5.5):
- General: (MB) Work item 4135 - Grouping Rows
- General: (MB) Work item 4427 - Semi-nightly builds
- Feature: (MB) Work item 3155 - Implement "date" datatype
- Feature: (MB) Work item 4150 - Date format not honored in CSV writer
- Feature: (MB) Work item 4199 - RichText and sharedStrings
- Feature: (MB) Work item 2346 - Implement more Excel calculation functions
            - Addition of DATE, DATEDIF, DATEVALUE, DAY, DAYS360
- Feature: (MBaker) Work item 2346 - Implement more Excel calculation functions
            - Addition of AVEDEV, HARMEAN and GEOMEAN
            - Addition of the BINOMDIST (Non-cumulative only), COUNTBLANK, EXPONDIST, FISHER, FISHERINV, NORMDIST, NORMSDIST, PERMUT, POISSON (Non-cumulative only) and STANDARDIZE Statistical Functions
            - Addition of the CEILING, COMBIN, EVEN, FACT, FACTDOUBLE, FLOOR, MULTINOMIAL, ODD, ROUNDDOWN, ROUNDUP, SIGN, SQRTPI and SUMSQ Mathematical Functions
            - Addition of the NORMINV, NORMSINV, CONFIDENCE and SKEW Statistical Functions
            - Addition of the CRITBINOM, HYPGEOMDIST, KURT, LOGINV, LOGNORMDIST, NEGBINOMDIST and WEIBULL Statistical Functions
            - Addition of the LARGE, PERCENTILE, QUARTILE, SMALL and TRIMMEAN Statistical Functions
            - Addition of the BIN2HEX, BIN2OCT, DELTA, ERF, ERFC, GESTEP, HEX2BIN, HEX2DEC, HEX2OCT, OCT2BIN and OCT2HEX Engineering Functions
            - Addition of the CHIDIST, GAMMADIST and GAMMALN Statistical Functions
            - Addition of the GCD, LCM, MROUND and SUBTOTAL Mathematical Functions
            - Addition of the LOWER, PROPER and UPPER Text Functions
            - Addition of the BETADIST and BETAINV Statistical Functions
            - Addition of the CHIINV and GAMMAINV Statistical Functions
            - Addition of the SERIESSUM Mathematical Function
            - Addition of the CHAR, CODE, FIND, LEN, REPT, SEARCH, T, TRIM Text Functions
            - Addition of the FALSE and TRUE Boolean Functions
            - Addition of the TDIST and TINV Statistical Functions
            - Addition of the EDATE, EOMONTH, YEAR, MONTH, TIME, TIMEVALUE, HOUR, MINUTE, SECOND, WEEKDAY, WEEKNUM, NOW, TODAY and Date/Time Function
            - Addition of the BESSELI, BESSELJ, BESSELK and BESSELY Engineering Functions
            - Addition of the SLN and SYD Financial Functions
            - reworked MODE calculation to handle floating point numbers
            - Improved error trapping for invalid input values
            - Fix to SMALL, LARGE, PERCENTILE and TRIMMEAN to eliminate non-numeric values
            - Added CDF to BINOMDIST and POISSON
            - Fix to a potential endless loop in CRITBINOM, together with other bugfixes to the algorithm
            - Fix to SQRTPI so that it will work with a real value parameter rather than just integers
            - Trap for passing negative values to FACT
            - Improved accuracy of the NORMDIST cumulative function, and of the ERF and ERFC functions
            - Replicated Excel data-type and error handling for BIN, DEC, OCT and HEX conversion functions
            - Replicated Excel data-type and error handling for AND and OR Boolean functions
            - Bugfix to MROUND
            - Rework of the DATE, DATEVALUE, DAY, DAYS360 and DATEDIF date/Time functions to use Excel dates rather than straight PHP dates
            - Rework of the AND, OR Boolean functions to ignore string values
            - Rework of the BIN2DEC, BIN2HEX, BIN2OCT, DEC2BIN, DEC2HEX, DEC2OCT Engineering functions to handle two's complement
            - Excel, Gnumeric and OpenOffice Calc compatibility flag for functions
                 Note, not all functions have yet been written to work with the Gnumeric and OpenOffice Calc compatibility flags
            - 1900 or 1904 Calendar flag for date functions
            - Reworked ExcelToPHP date method to handle the Excel 1900 leap year
                 Note that this will not correctly return values prior to 13-Dec-1901 20:45:52 as this is the minimum value that PHP date serial values can handle. If you need to work with dates prior to this, then an ExcelToPHPObject method has been added which will work correctly with values between Excel's 1900 calendar base date of 1-Jan-1900, and 13-Dec-1901
            - Addition of ExcelToPHPObject date method to return a PHP DateTime object from an Excel date serial value
            - PHPToExcel method modified to accept either PHP date serial numbers or PHP DateTime objects
            - Addition of FormattedPHPToExcel which will accept a date and time broken to into year, month, day, hour, minute, second and return an Excel date serial value
- Feature: (MB) Work item 4485 - Control characters in Excel 2007
- Feature: (MB) Work item 4796 - BaseDrawing::setWidthAndHeight method request
- Feature: (MB) Work item 4798 - Page Setup -> Print Titles -> Sheet -> 'Rows to repeat at top'
- Feature: (MB) Work item 4433 - Comment functionality
- Bugfix: (MB) Work item 4124 - Undefined variable in PHPExcel_Writer_Serialized
- Bugfix: (MB) Work item 4125 - Notice: Object of class PHPExcel_RichText could not be converted to int
- Bugfix: (MB) Work item 4126 - Excel5Writer: utf8 string not converted to utf16
- Bugfix: (MB) Work item 4180 - PHPExcel_RichText and autosize
- Bugfix: (MB) Work item 4574 - Excel5Writer produces broken xls files after change mentioned in work item 4126
- Bugfix: (MB) Work item 4797 - Small bug in PHPExcel_Reader_Excel2007 function _readStyle


2007/10/23 (v 1.5.0):
- General: (MB) Work item 3265 - Refactor PHPExcel Drawing
- Feature: (CS) Work item 3079 - Update Shared/OLE.php to latest version from PEAR
- Feature: (MB) Work item 3217 - Excel2007 vs Excel2003 compatibility pack
- Feature: (MB) Work item 3234 - Cell protection (lock/unlock)
- Feature: (MB) Work item 3543 - Create clickable links (hyperlinks)
- Feature: (MB) Work item 3241 - Additional page setup parameters
- Feature: (MB) Work item 3300 - Make temporary file path configurable (Excel5)
- Feature: (MB) Work item 3306 - Small addition to applyFromArray for font
- Feature: (MB) Work item 3373 - Better feedback when save of file is not possible
- Bugfix: (MB) Work item 3181 - Text Rotation
- Bugfix: (MB) Work item 3237 - Small bug in Page Orientation
- Bugfix: (MB) Work item 3812 - insertNewColumnBeforeByColumn undefined
- Bugfix: (MB) Work item 3893 - Sheet references not working in formula (Excel5 Writer)


2007/08/23 (v 1.4.5):
- General: (MB) Work item 3003 - Class file endings
- General: (MB) Work item 3081 - Different calculation engine improvements
- General: (MB) Work item 3082 - Different improvements in PHPExcel_Reader_Excel2007
- General: (MB) Work item 3146 - Set XML indentation in PHPExcel_Writer_Excel2007
- Feature: (MB) Work item 3159 - Optionally store temporary Excel2007 writer data in file instead of memory
- Feature: (MB) Work item 3063 - Implement show/hide gridlines
- Feature: (MB) Work item 3064 - Implement option to read only data
- Feature: (MB) Work item 3080 - Optionally disable formula precalculation
- Feature: (MB) Work item 3154 - Explicitly set cell datatype
- Feature: (MBaker) Work item 2346 - Implement more Excel calculation functions
             - Addition of MINA, MAXA, COUNTA, AVERAGEA, MEDIAN, MODE, DEVSQ, STDEV, STDEVA, STDEVP, STDEVPA, VAR, VARA, VARP and VARPA Excel Functions
             - Fix to SUM, PRODUCT, QUOTIENT, MIN, MAX, COUNT and AVERAGE functions when cell contains a numeric value in a string datatype, bringing it in line with MS Excel behaviour
- Bugfix: (MB) Work item 2881 - File_exists on ZIP fails on some installations
- Bugfix: (MB) Work item 2879 - Argument in textRotation should be -90..90
- Bugfix: (MB) Work item 2883 - Excel2007 reader/writer not implementing OpenXML/SpreadsheetML styles 100% correct
- Bugfix: (MB) Work item 2513 - Active sheet index not read/saved
- Bugfix: (MB) Work item 2935 - Print and print preview of generated XLSX causes Excel2007 to crash
- Bugfix: (MB) Work item 2952 - Error in Calculations - COUNT() function
- Bugfix: (MB) Work item 3002 - HTML and CSV writer not writing last row
- Bugfix: (MB) Work item 3017 - Memory leak in Excel5 writer
- Bugfix: (MB) Work item 3044 - Printing (PHPExcel_Writer_Excel5)
- Bugfix: (MB) Work item 3046 - Problems reading zip://
- Bugfix: (MB) Work item 3047 - Error reading conditional formatting
- Bugfix: (MB) Work item 3067 - Bug in Excel5 writer (storePanes)
- Bugfix: (MB) Work item 3077 - Memory leak in PHPExcel_Style_Color


2007/07/23 (v 1.4.0):
- General: (MB) Work item 2687 - Coding convention / code cleanup
- General: (MB) Work item 2717 - Use set_include_path in tests
- General: (MB) Work item 2812 - Move PHPExcel_Writer_Excel5 OLE to PHPExcel_Shared_OLE
- Feature: (MB) Work item 2679 - Hide/Unhide Column or Row
- Feature: (MB) Work item 2271 - Implement multi-cell styling
- Feature: (MB) Work item 2720 - Implement CSV file format (reader/writer)
- Feature: (MB) Work item 2845 - Implement HTML file format
- Bugfix: (MB) Work item 2513 - Active sheet index not read/saved
- Bugfix: (MB) Work item 2678 - Freeze Panes with PHPExcel_Writer_Excel5
- Bugfix: (MB) Work item 2680 - OLE.php
- Bugfix: (MB) Work item 2736 - Copy and pasting multiple drop-down list cells breaks reader
- Bugfix: (MB) Work item 2775 - Function setAutoFilterByColumnAndRow takes wrong arguments
- Bugfix: (MB) Work item 2858 - Simplexml_load_file fails on ZipArchive


2007/06/27 (v 1.3.5):
- General: (MB) Work item 15 - Documentation
- Feature: (JV) PHPExcel_Writer_Excel5
- Feature: (JV) PHPExcel_Reader_Excel2007: Image shadows
- Feature: (MB) Work item 2385 - Data validation
- Feature: (MB) Work item 187 - Implement richtext strings
- Bugfix: (MB) Work item 2443 - Empty relations when adding image to any sheet but the first one
- Bugfix: (MB) Work item 2536 - Excel2007 crashes on print preview


2007/06/05 (v 1.3.0):
- General: (MB) Work item 1942 - Create PEAR package
- General: (MB) Work item 2331 - Replace *->duplicate() by __clone()
- Feature: (JV) PHPExcel_Reader_Excel2007: Column auto-size, Protection, Merged cells, Wrap text, Page breaks, Auto filter, Images
- Feature: (MB) Work item 245 - Implement "freezing" panes
- Feature: (MB) Work item 2273 - Cell addressing alternative
- Feature: (MB) Work item 2270 - Implement cell word-wrap attribute
- Feature: (MB) Work item 2282 - Auto-size column
- Feature: (MB) Work item 241 - Implement formula calculation
- Feature: (MB) Work item 2375 - Insert/remove row/column
- Bugfix: (MB) Work item 1931 - PHPExcel_Worksheet::getCell() should not accept absolute coordinates
- Bugfix: (MB) Work item 2272 - Cell reference without row number
- Bugfix: (MB) Work item 2276 - Styles with same coordinate but different worksheet
- Bugfix: (MB) Work item 2290 - PHPExcel_Worksheet->getCellCollection() usort error
- Bugfix: (SS) Work item 2353 - Bug in PHPExcel_Cell::stringFromColumnIndex
- Bugfix: (JV) Work item 2353 - Reader: numFmts can be missing, use cellStyleXfs instead of cellXfs in styles


2007/04/26 (v 1.2.0):
- General: (MB) Stringtable attribute "count" not necessary, provides wrong info to Excel sometimes...
- General: (MB) Updated tests to address more document properties
- General: (MB) Some refactoring in PHPExcel_Writer_Excel2007_Workbook
- General: (MB) New package: PHPExcel_Shared
- General: (MB) Password hashing algorithm implemented in PHPExcel_Shared_PasswordHasher
- General: (MB) Moved pixel conversion functions to PHPExcel_Shared_Drawing
- General: (MB) Work item 244 - Switch over to LGPL license
- General: (MB) Work item 5 - Include PHPExcel version in file headers
- Feature: (MB) Work item 6 - Autofilter
- Feature: (MB) Work item 7 - Extra document property: keywords
- Feature: (MB) Work item 8 - Extra document property: category
- Feature: (MB) Work item 9 - Document security
- Feature: (MB) Work item 10 - PHPExcel_Writer_Serialized and PHPExcel_Reader_Serialized
- Feature: (MB) Work item 11 - Alternative syntax: Addressing a cell
- Feature: (MB) Work item 12 - Merge cells
- Feature: (MB) Work item 13 - Protect ranges of cells with a password
- Bugfix: (JV) Work item 14 - (style/fill/patternFill/fgColor or bgColor can be empty)


2007/03/26 (v 1.1.1):
- Bugfix: (MB) Work item 1250 - Syntax error in "Classes/PHPExcel/Writer/Excel2007.php" on line 243
- General: (MB) Work item 1282 - Reader should check if file exists and throws an exception when it doesn't


2007/03/22 (v 1.1.0):
- Changed filenames of tests
- Bugfix: (MB) Work item 836 - Style information lost after passing trough Excel2007_Reader
- Bugfix: (MB) Work item 913 - Number of columns > AZ fails fixed in PHPExcel_Cell::columnIndexFromString
- General: (MB) Added a brief file with installation instructions
- Feature: (MB) Page breaks (horizontal and vertical)
- Feature: (MB) Image shadows



2007/02/22 (v 1.0.0):
- Changelog now includes developer initials
- Bugfix: (JV) PHPExcel->removeSheetByIndex now re-orders sheets after deletion, so no array indexes are lost
- Bugfix: (JV) PHPExcel_Writer_Excel2007_Worksheet::_writeCols() used direct assignment to $pSheet->getColumnDimension('A')->Width instead of $pSheet->getColumnDimension('A')->setWidth()
- Bugfix: (JV) DocumentProperties used $this->LastModifiedBy instead of $this->_lastModifiedBy.
- Bugfix: (JV) Only first = should be removed when writing formula in PHPExcel_Writer_Excel2007_Worksheet.
- General: (JV) Consistency of method names to camelCase
- General: (JV) Updated tests to match consistency changes
- General: (JV) Detection of mime-types now with image_type_to_mime_type()
- General: (JV) Constants now hold string value used in Excel 2007
- General: (MB) Fixed folder name case (WorkSheet -> Worksheet)
- Feature: (MB) PHPExcel classes (not the Writer classes) can be duplicated, using a duplicate() method.
- Feature: (MB) Cell styles can now be duplicated to a range of cells using PHPExcel_Worksheet->duplicateStyle()
- Feature: (MB) Conditional formatting
- Feature: (JV) Reader for Excel 2007 (not supporting full specification yet!)



2007/01/31 (v 1.0.0 RC):
- Project name has been changed to PHPExcel
- Project homepage is now http://www.codeplex.com/PHPExcel
- Started versioning at number: PHPExcel 1.0.0 RC



2007/01/22:
- Fixed some performance issues on large-scale worksheets (mainly loops vs. indexed arrays)
- Performance on creating StringTable has been increased
- Performance on writing Excel2007 worksheet has been increased



2007/01/18:
- Images can now be rotated
- Fixed bug: When drawings have full path specified, no mime type can be deducted
- Fixed bug: Only one drawing can be added to a worksheet



2007/01/12:
- Refactoring of some classes to use ArrayObject instead of array()
- Cell style now has support for number format (i.e. #,##0)
- Implemented embedding images



2007/01/02:
- Cell style now has support for fills, including gradient fills
- Cell style now has support for fonts
- Cell style now has support for border colors
- Cell style now has support for font colors
- Cell style now has support for alignment



2006/12/21:
- Support for cell style borders
- Support for cell styles
- Refactoring of Excel2007 Writer into multiple classes in package SpreadSheet_Writer_Excel2007
- Refactoring of all classes, changed public members to public properties using getter/setter
- Worksheet names are now unique. On duplicate worksheet names, a number is appended.
- Worksheet now has parent SpreadSheet object
- Worksheet now has support for page header and footer
- Worksheet now has support for page margins
- Worksheet now has support for page setup (only Paper size and Orientation)
- Worksheet properties now accessible by using getProperties()
- Worksheet now has support for row and column dimensions (height / width)
- Exceptions thrown have a more clear description



Initial version:
- Create a Spreadsheet object
- Add one or more Worksheet objects
- Add cells to Worksheet objects
- Export Spreadsheet object to Excel 2007 OpenXML format
- Each cell supports the following data formats: string, number, formula, boolean.

