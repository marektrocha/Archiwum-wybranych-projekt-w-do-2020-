<?php

namespace MarekTrochaRekrutacjaHRtec;

class Convert {

    public $link;                                               // Internal link from RSS
    public $title;                                              // Internal title from RSS
    public $description;                                        // Internal description from RSS
    public $pubDate;                                            // Internal date from RSS
    public $dc;                                                 // Formatted data
    public $creator;                                            // Author of article
    public $header = [];                                        // Array with headers of table in the csv
    public $fields = [];                                        // Fontent of csv file
    public $csvFile;                                            // File csv with new data
    public $rss;                                                // Content of RSS
    public $url = "https://blog.nationalgeographic.org/rss";    // Source: URL RSS
    public $path = "simple_export.csv";                         // Name of file csv

    public function loader($type, $url, $path) {                // Method of loader
        $this->rss = simplexml_load_file($url);                 // Convert xml to object

        if($this->rss) {                                        // URL correct. If there is rss, then download the dataes and adjust their format

            foreach($this->rss->channel->item as $item) {       // Check and add available articles (each on a new rows)
                $this->link = $item->link;                      // Article link from RSS
                $this->title = $item->title;                    // Title of article from RSS
                $this->description = $item->description;        // Description of article from RSS
                $this->pubDate = $item->pubDate;                // Date of article from RSS
                $this->newDateTime = date("Y-m-d H:i:s", strtotime($this->pubDate));   // Customize date format to "Y-m-d H:i:s"
                $this->dc = $item->children("http://purl.org/dc/elements/1.1/");      // Clearing text (line 4 from RSS file and <dc:creator>...)
                $this->creator = $this->dc->creator;            // Author of article
            
                $this->fields[] = [                             // Array with columns in csv: title, description, link, date and creator
                    $this->title,
                    $this->description,
                    $this->link,
                    $this->newDateTime,
                    $this->creator
                ];
            }

            $this->csvFile = fopen($path, $type);                                   // Open the file and use type w+ or a+. | fopen(file, mode)
            $this->header = ["title", "description","link","pubDate","creator"];    // Add headers to csv file
            fputcsv($this->csvFile, $this->header, ";")or die("Write error!");      // Header of table. Separate the columns with ";" | fputcsv(file, fields, sepator)

            foreach($this->fields as $field) {                                      // Body of table. Add each new row
                fputcsv($this->csvFile, $field, ";")or die("Write error!");         // Separate the columns with ";"
            }

            fclose($this->csvFile);                                                 // Close the file
            return true;

        } else {
            echo "=== ERROR ===\n Invalid feed of URL\n=============";              // Error reading URL
        }
    }
}