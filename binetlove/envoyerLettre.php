<?php 
            $datetime = date_create()->format('Y-m-d H:i:s');
            /*$dbh->query("INSERT INTO `lettre` (`login`, `destinataire`, `contenu`, `time`) VALUES ('patate', 'mathilde_andre', 'coucou', '2020-12-18 16:32:25')");
            */insererLettre($dbh,'patate','mathilde_andre','coucou',$datetime); 
            $dbh = null;
        ?>

