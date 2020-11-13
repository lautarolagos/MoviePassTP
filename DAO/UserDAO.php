<?php
    namespace DAO;

    use \Exception as Exception;
    use Interfaces\IUserDAO as IUserDAO;
    use Models\User as User;    
    use DAO\Connection as Connection;

    class UserDAO implements IUserDAO
    {
        private $connection;
        private $tableName = "users";

        public function Add(User $user)
        {
            try
            {
                $query = "INSERT INTO ".$this->tableName." (firstName, lastName, email, password, city) VALUES (:firstName, :lastName, :email, :password, :city);";
                $parameters["firstName"] = $user->getFirstName();
                $parameters["lastName"] = $user->getLastName();
                $parameters["email"] = $user->getEmail();
                $parameters['password'] = $user->getPassword();
                $parameters['city'] = $user->getCity();

                $this->connection = Connection::GetInstance();

                $this->connection->ExecuteNonQuery($query, $parameters);
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }

        public function GetAll()
        {
            try
            {
                $usersList = array();

                $query = "SELECT * FROM ".$this->tableName;

                $this->connection = Connection::GetInstance();

                $resultSet = $this->connection->Execute($query);
                
                foreach ($resultSet as $row)
                {                
                    $user = new User();
                    $user->setIdUser($row["idUser"]);
                    $user->setFirstName($row["firstName"]);
                    $user->setLastName($row["lastName"]);
                    $user->setEmail($row['email']);
                    $user->setPassword($row['password']);
                    $user->setIsAdmin($row['isAdmin']);
                    $user->setCity($row['city']);

                    array_push($usersList, $user);
                }

                return $usersList;
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }

        public function Read($email, $password) // Busca un usuario en la BDD donde coincida mail y contraseña, es para el Login Check
        {
            $sql = "SELECT * FROM ".$this->tableName . " WHERE (email = :email) AND password = :password";
            
            $parameters['email'] = $email;
            $parameters['password'] = $password;

            try
            {
                $this->connection = Connection::getInstance();
                $resultSet = $this->connection->Execute($sql, $parameters, QueryType::Query);
            } catch(Exception $ex)
            {
                throw $ex;
            }

            if(!empty($resultSet))
                return $this->mapear($resultSet);
            else
                return false;
        }

        public function Search($email) // Busca un usuario en la BDD, solo necesita el email, se utiliza en el Register
        {
            $sql = "SELECT * FROM ".$this->tableName . " WHERE (email = :email)";

            $parameters['email'] = $email;

            try
            {
                $this->connection = Connection::getInstance();
                $resultSet = $this->connection->Execute($sql, $parameters, QueryType::Query);
            } catch(Exception $ex)
            {
                throw $ex;
            }

            if(!empty($resultSet))
                return $this->mapear($resultSet);
            else
                return false;
        }


        protected function mapear($value)
        {
            $value = is_array($value) ? $value : [];

            $resp = array_map( function($p){
                return new User($p['idUser'], $p['firstName'], $p['lastName'], $p['email'], $p['password'], $p['isAdmin'], $p['city']);
            }, $value);
            
            return count($resp) > 1 ? $resp : $resp['0'];
        }
    }
?>