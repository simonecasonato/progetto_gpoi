SELECT c.nome, c.sport, tf.prezzo 
FROM `possiede` AS p
LEFT JOIN tariffa AS tf
	ON tf.ID_tariffa = p.ID_tariffa
LEFT JOIN coach_ia AS c
	ON c.ID_coach = p.ID_coach
WHERE tf.prezzo=20;

--trova il nome del coach, lo sport e il prezzo della tariffa 



SELECT COUNT(*) AS prenotazioni
FROM prenota 
WHERE ID_utente=2 AND ID_coach=2

--trova il numero di prenotazioni per l'utente 2 e il coach 2


SELECT c.nome, c.sport, p.data_prenotazione 
FROM `prenota` AS p
LEFT JOIN coach_ia as c
	ON c.ID_coach = p.ID_coach
WHERE p.ID_utente = 2;

--trova il nome del coach, lo sport e la data della prenotazione per il singolo utente


SELECT u.nome,u.cognome,c.nome,c.sport,rc.testo,rc.valutazione
FROM `recensione` AS rc
LEFT JOIN utente AS u
	ON rc.ID_utente=u.ID_utente
LEFT JOIN coach_ia AS c
	ON rc.id_coach=c.ID_coach

--trova tutte le recensioni stampando anche nome del utente e del coach