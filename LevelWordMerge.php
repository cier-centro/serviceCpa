<?php

class LevelWordMerge {
    
    /**
     * @type Reader
     * @type Level
     * @type Word 
     */
    
    protected $reader;
    protected $level;
    protected $word;
    
    public function setReader($reader) {
        $this->reader = $reader;
    }
    
    public function setLevel($level) {
        $this->level = $level;
    }
    
    public function setWord($word) {
        $this->word = $word;
    }
    
    public function getGenerateArrayByLevels() {
        $levelsArray = $this->level->getArrayAllLevels();
        $dataArray = array();

        foreach ($levelsArray as $i => $numberLevel) {
            $dataArray[$i]['code_lo'] = $numberLevel;
            $showWordsArray = $this->word->getArrayWordsByLevel($numberLevel);
            $dataArray[$i]['level'] = "$showWordsArray";
            $wordValid = $this->word->getConsultWordValidByLevel($numberLevel);
            $dataArray[$i]['grade'] = $wordValid;
            $wordTranslated = $this->word->getConsultWordTranslatedByLevel($numberLevel);
            $dataArray[$i]['matter'] = $wordTranslated;
            $nameObjectLearning = $this->word->getNameObjectLearning($numberLevel);
            $dataArray[$i]['name_lo'] = $nameObjectLearning;
        }
        
        return $dataArray;
    }
    
}
