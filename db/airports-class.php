<?php

class Airports {

	// table
	private $db;
    private $table = "airports";

    // object properties
    public $id;
    public $name;
    public $latitude;
    public $longitude;

    /**
     * Constructor with $db
     *
     * @param $db
     */
    public function __construct($db){
        $this->db = $db;
    }


    /**
     * Create user
     *
     * @return boolean
     */
	public function create ($data) {
        $sql= "INSERT INTO airports (name, latitude, longitude) VALUES ('$data->name', '$data->latitude', '$data->longitude')";

        if ($this->db->query($sql)) {
            return true;
        }
        return false;
	}

    /**
     * Read all users
     *
     * @return array
     */
    public function read() {

        $sql = 'SELECT * FROM airports';
        $query = $this->db->query($sql);

        $jsonArray = array();
        
        while( $row = $query->fetchArray(SQLITE3_ASSOC) ) {

            $jsonArray[] = $row;
        }

        // print_r( $jsonArray );

        return $jsonArray;
    }

    /**
     * Update user
     *
     * @return boolean
     */
	public function update($data) {

        $sql="UPDATE airports SET NAME = '$data->name' WHERE id = id = :id";
        $query = $this->db->query($sql);
        $query->bindValue(':id', $data->id);
        $query->execute();
        
        if ($query) {
            return true;
        }
        return false;
        
	}

    /**
     * Delete airport
     *
     * @return boolean
     */
	public function delete ($data) {
        $sql = "DELETE FROM airports WHERE id = :id";
        $query = $this->db->prepare($sql);
        $query->bindValue(':id', $data->id);
        $query->execute();

        if ($query) {
            return true;
        }
        return false;
    }
}

?>
