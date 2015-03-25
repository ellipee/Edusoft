<?php
namespace Admin\Model;

use DataTable\Model\DataTable;

/**
 * ProductDataTable
 *
 * Classe responsável por fazer com que seja possível trabalhar com o plugin 
 * DataTables junto com o ORM Doctrine para efetuar paginações.
 *
 * Neste caso, utilizando as regras específicas para a entidade Product.
 *
 * @author Thiago Pelizoni <thiago.pelizoni@gmail.com>
 */
class AcademicsessionDataTable extends DataTable
{
    public function findAll()
    {
        if (! $this->getConfiguration()) {
            // Este array deve ser na ordem das colunas da listagem
            $configuration = array(
                'id',
                'session',
                'term',
                'startdate',
                'enddate',
            );
            $this->setConfiguration($configuration);
        }           

        /**
         * Irá montar os dados que serão exibidos no DataTable
         *
         * Neste tutorial, a sequencia da listagem está sendo: 'id', 'name', 'description'.
         * Desta forma, o array que será atribuido a variável DataTable::aaData deve estar
         * na mesma sequencia.
         */ 
        if (! $this->getAaData()) {
            $aaData = array();

            foreach ($this->getPaginator() as $academicsession) {
                $data = array(
                    $academicsession->id,
                    $academicsession->name,
                    $academicsession->description,
                    "<a class='btn' href='/academicsession/edit/{$academicsession->id}'>Edite</a> "
                        . "<a class='btn btn-danger' href='/academicsession/delete/{$academicsession->id}'>Excluir</a>",
                );

                $aaData[] = $data;
            }

            $this->setAaData($aaData);
        }

        return $this->getJson();
    }

}