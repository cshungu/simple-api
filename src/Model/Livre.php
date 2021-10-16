<?php

namespace App\Model;

class Livre extends Model
{
    public ?int $id = 0;
    public ?string $isbn = "";
    public ?string $titre = "";
    public ?string $auteur = "";
    public ?string $annee_edition = "";
    public ?float $prix  = 0.0;

    /**
     * GET findAll
     * 
     * @return array
     */
    public function findAll(): array
    {
        $sql  = "SELECT * FROM " . self::table($this);
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(\PDO::FETCH_CLASS, __CLASS__);
        $stmt->closeCursor();
        return $result ?? [];
    }
    /**
     * GET Find
     * 
     * @param int $id - 
     * 
     * @return int
     */
    public function find(int $id): self
    {
        $sql  = "SELECT * FROM " . self::table($this);
        $sql .= " WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $id, \PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetchObject(__CLASS__);
        $stmt->closeCursor();

        return is_object($result) ? $result : $this;
    }
    /**
     * Delete
     * 
     * @param int $id - 
     *
     * @return $id
     */
    public function delete(int $id): bool
    {
        $livre = $this->find($id);
        $id   = (int) $id;
        if ($livre->id) {
            $sql = sprintf(
                "DELETE FROM " . self::table($this) . " WHERE id = %d",
                $id
            );
            $this->db->exec($sql);
            return true;
        }
        return false;
    }

    /**
     * Methode save
     * 
     * @return int
     */
    public function save(): ?int
    {
        if ($this->id) {
            $sql  = "UPDATE " . self::table($this) . " SET  ";
            $sql .= "isbn=?, titre=?, auteur=?, annee_edition=?, prix=?  WHERE id=? ";
            $stmt = $this->db->prepare($sql);
            $stmt->execute(
                [
                    $this->isbn, $this->titre, $this->auteur,
                    $this->annee_edition, $this->prix, $this->id
                ]
            );
            return $this->id;
        } else {
            $sql = "INSERT INTO " . self::table($this);
            $sql .= " (isbn, titre, auteur, annee_edition, prix) ";
            $sql .= " VALUES (?, ?, ?, ?, ?)  ";
            $stmt = $this->db->prepare($sql);
            $stmt->execute(
                [
                    $this->isbn, $this->titre, $this->auteur,
                    $this->annee_edition, $this->prix
                ]
            );
            $id = $this->db->lastInsertId('id');

            return $id;
        }
    }
}
