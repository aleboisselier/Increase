<?php

class Message extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    protected $id;

    /**
     *
     * @var string
     */
    protected $objet;

    /**
     *
     * @var string
     */
    protected $content;

    /**
     *
     * @var string
     */
    protected $date;

    /**
     *
     * @var integer
     */
    protected $idUser;

    /**
     *
     * @var integer
     */
    protected $idProjet;

    /**
     *
     * @var integer
     */
    protected $idFil;

    /**
     * Method to set the value of field id
     *
     * @param integer $id
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Method to set the value of field objet
     *
     * @param string $objet
     * @return $this
     */
    public function setObjet($objet)
    {
        $this->objet = $objet;

        return $this;
    }

    /**
     * Method to set the value of field content
     *
     * @param string $content
     * @return $this
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Method to set the value of field date
     *
     * @param string $date
     * @return $this
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Method to set the value of field idUser
     *
     * @param integer $idUser
     * @return $this
     */
    public function setIdUser($idUser)
    {
        $this->idUser = $idUser;

        return $this;
    }

    /**
     * Method to set the value of field idProjet
     *
     * @param integer $idProjet
     * @return $this
     */
    public function setIdProjet($idProjet)
    {
        $this->idProjet = $idProjet;

        return $this;
    }

    /**
     * Method to set the value of field idFil
     *
     * @param integer $idFil
     * @return $this
     */
    public function setIdFil($idFil)
    {
        $this->idFil = $idFil;

        return $this;
    }

    /**
     * Returns the value of field id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Returns the value of field objet
     *
     * @return string
     */
    public function getObjet()
    {
        return $this->objet;
    }

    /**
     * Returns the value of field content
     *
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Returns the value of field date
     *
     * @return string
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Returns the value of field idUser
     *
     * @return integer
     */
    public function getIdUser()
    {
        return $this->idUser;
    }

    /**
     * Returns the value of field idProjet
     *
     * @return integer
     */
    public function getIdProjet()
    {
        return $this->idProjet;
    }

    /**
     * Returns the value of field idFil
     *
     * @return integer
     */
    public function getIdFil()
    {
        return $this->idFil;
    }
    
    public function getFormattedDate($format = 'Y-m-d H:i:s'){
    	$date = new DateTime($this->date);
    	return $date->format($format);
    }
    
    public function getSince(){
    	$time = strtotime($this->date);
    	$time = time() - $time; // to get the time since that moment
    	$time = ($time<1)? 1 : $time;
    	$tokens = array (
    			31536000 => 'an',
    			2592000 => 'mois',
    			604800 => 'semaine',
    			86400 => 'jour',
    			3600 => 'heure',
    			60 => 'minute',
    			1 => 'seconde'
    	);
    	
    	foreach ($tokens as $unit => $text) {
    		if ($time < $unit) continue;
    		$numberOfUnits = floor($time / $unit);
    		return $numberOfUnits.' '.$text.(($numberOfUnits>1 && $text[strlen($text)-1] != 's')?'s':'');
    	}
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->hasMany('id', 'Message', 'idFil', array('alias' => 'Message'));
        $this->belongsTo('idFil', 'Message', 'id', array('alias' => 'Message'));
        $this->belongsTo('idProjet', 'Projet', 'id', array('alias' => 'Projet'));
        $this->belongsTo('idUser', 'User', 'id', array('alias' => 'User'));
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Message[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Message
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }


    public function __toString(){
    	$str = $this->content;
    	if (strlen($str) > 47){
    		$str = substr($this->content, 0, 47)."...";
    	}
    	return $this->getUser()." : <i>".$str."</i>";
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'message';
    }

}
