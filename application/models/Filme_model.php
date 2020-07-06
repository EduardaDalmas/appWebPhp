<?php
    class filme_model extends CI_Model {

        public function pesquisa_filmes($titulo) {
            $this->db->like('titulo', $titulo);
            $this->db->order_by("titulo");
            return $this->db->get('filmes');
        }

        public function pesquisa_filmes_pag($limite, $pag, $titulo) {
            $this->db->like('titulo', $titulo);
            $this->db->order_by("titulo");
            $this->db->limit($limite, $pag);
            return $this->db->get('filmes');
        }

        public function getPage($limite, $pag) {
            $this->db->order_by("titulo");
            $this->db->limit($limite, $pag);
            return $this->db->get('filmes');
        }

        public function getFilmes() {
            $sql = "SELECT * FROM filmes ORDER BY titulo";
            $result = $this->db->query($sql);
            $array_resultado = $result->result_array();
            return $array_resultado;
        }

        public function get($id = null) {
            if ($id) {
                $this->db->where('id', $id);
            }
            $this->db->order_by("titulo");
            return $this->db->get('filmes');

        }


        public function gravar($dados = null, $id = null) {
            if ($id) {
                $this->db->where('id', $id);
                if ($this->db->update('filmes', $dados)) {
                    return true;
                } else {
                    return false;
                }
            }
            if ($this->db->insert('filmes', $dados)) {
                return true;
            } else {
                return false;
            }
        }

        public function excluir($id = null) 
        {
            if ($id) {
                $this->db->where('id', $id);
                if ($this->db->delete('filmes')) {
                    return true;
                } else {
                    return false;
                }
            }
        }

    }
?>