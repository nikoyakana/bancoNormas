<?php
include_once'conexao.php';
$con->createFunction('rank', 'sql_rank');
$con->query('CREATE VIRTUAL TABLE documents USING fts4 (id INTEGER PRIMARY KEY AUTOINCREMENT, title VARCHAR, category VARCHAR, pageno VARCHAR, description TEXT);');
$con->query('SELECT * FROM documents WHERE valor MATCH \'Computer\' ORDER BY rank(matchinfo(valor), 0, 1.0, 0.5) DESC;');




function sql_rank($aMatchInfo){
    
    $iSize = 6;
    
    $iPhrase = (int) 0;                 // Current phrase //
    
    $score = (double)0.0;               // Value to return //
    
    
    
    /* Check that the number of arguments passed to this function is correct.
    
    ** If not, jump to wrong_number_args. Set aMatchinfo to point to the array
    
    ** of unsigned integer values returned by FTS function matchinfo. Set
    
    ** nPhrase to contain the number of reportable phrases in the users full-text
    
    ** query, and nCol to the number of columns in the table.
    
    */
    
    $aMatchInfo = (string) func_get_arg(0);
    
    $nPhrase = ord(substr($aMatchInfo, 0, $iSize));
    
    $nCol = ord(substr($aMatchInfo, $iSize, $iSize));
    
    
    
    if (func_num_args() > (1 + $nCol))
    
    {
        
        throw new Exception("Invalid number of arguments : ".$nCol);
        
    }
    
    
    
    // Iterate through each phrase in the users query. //
    
    for ($iPhrase = 0; $iPhrase < $nPhrase; $iPhrase++)
    
    {
        
        $iCol = (int) 0; // Current column //
        
        
        
        /* Now iterate through each column in the users query. For each column,
        
        ** increment the relevancy score by:
        
        **
        
        **   (<hit count> / <global hit count>) * <column weight>
        
        **
        
        ** aPhraseinfo[] points to the start of the data for phrase iPhrase. So
        
        ** the hit count and global hit counts for each column are found in
        
        ** aPhraseinfo[iCol*3] and aPhraseinfo[iCol*3+1], respectively.
        
        */
        
        $aPhraseinfo = substr($aMatchInfo, (2 + $iPhrase * $nCol * 3) * $iSize);
        
        
        
        for ($iCol = 0; $iCol < $nCol; $iCol++)
        
        {
            
            $nHitCount = ord(substr($aPhraseinfo, 3 * $iCol * $iSize, $iSize));
            
            $nGlobalHitCount = ord(substr($aPhraseinfo, (3 * $iCol + 1) * $iSize, $iSize));
            
            $weight = ($iCol < func_num_args() - 1) ? (double) func_get_arg($iCol + 1) : 0;
            
            
            
            if ($nHitCount > 0)
            
            {
                
                $score += ((double)$nHitCount / (double)$nGlobalHitCount) * $weight;
                
            }
            
        }
        
    }
    
    
    
    return $score;
    
}



?>