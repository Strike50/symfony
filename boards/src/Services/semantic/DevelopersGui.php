<?php
/**
 * Created by PhpStorm.
 * User: lhoul
 * Date: 28/02/2018
 * Time: 09:25
 */

namespace App\Services\semantic;

use Ajax\php\symfony\JquerySemantic;
use Ajax\semantic\html\base\constants\Color;
use Ajax\semantic\html\elements\HtmlLabel;
use App\Entity\Developer;

class DevelopersGui extends JquerySemantic
{
    public function dataTable($devs)
    {
     $dt=$this->_semantic->dataTable("dtDevelopers","App\Entity\Developer",$devs);
     $dt->setFields(["identity"]);
     $dt->setCaptions(["Identity"]);
     $dt->setValueFunction("identity", function($v,$dev){
         $lbl=new HtmlLabel("",$dev->getIdentity());
         return $lbl;
     });
     return $dt;
    }

    public function frm(Developer $dev){
        $frm=$this->_semantic->dataForm("frm-developer", $dev);
        $frm->setFields(["id","identity","submit","cancel"]);
        $frm->setCaptions(["","Identity","Valider","Annuler"]);
        $frm->fieldAsHidden("id");
        $frm->fieldAsInput("identity",["rules"=>["empty","maxLength[30]"]]);
        $frm->setValidationParams(["on"=>"blur","inline"=>true]);
        $frm->onSuccess("$('#frm-developer').hide();");
        $frm->fieldAsSubmit("submit","positive","developer/submit", "#dtDeveloper",["ajax"=>["attr"=>"","jqueryDone"=>"replaceWith"]]);
        $frm->fieldAsLink("cancel",["class"=>"ui button cancel"]);
        $this->click(".cancel","$('#frm-developer').hide();");
        return $frm;
    }

}