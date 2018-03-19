<?php
/**
 * Created by PhpStorm.
 * User: lhoul
 * Date: 21/02/2018
 * Time: 08:52
 */

namespace App\Services\semantic;

use Ajax\php\symfony\JquerySemantic;
use Ajax\semantic\html\elements\HtmlLabel;

class ProjectsGui extends JquerySemantic{
    public function button(){
        $bt=$this->semantic()->htmlButton("btProjects","Projets","orange");
        $bt->getOnClick($this->getUrl("/projects"),"#response",["attr"=>""]);
        return $bt;
    }

    public function buttons(){
        $bts=$this->_semantic->htmlButtonGroups("bts",["Projects","Tags","Developers"]);
        $bts->addIcons(["folder","tags","user"]);
        $bts->setPropertyValues("data-url", ["projects","tags","developers"]);
        $bts->getOnClick("","#response",["attr"=>"data-url"]);
    }

    public function dataTable($projects){
        $dt=$this->_semantic->dataTable("dtProjects", "App\Entity\Project", $projects);
        $dt->setFields(["name","descriptif","startDate","dueDate"]);
        $dt->setCaptions(["Name","Descriptif","StartDate","DueDate"]);
        $dt->setValueFunction("name", function($v,$project){
            $lbl=new HtmlLabel("",$project->getName());
            return $lbl;
        });
        $dt->setValueFunction("descriptif",function($v,$project){
            $lbl=new HtmlLabel("",$project->getDescriptif());
            return $lbl;
        });
        $dt->setValueFunction("startDate",function($v,$project){
            $string = ($project->getStartdate())->format('Y-m-d');
            $lbl=new HtmlLabel("",$string);
            return $lbl;
        });
        $dt->setValueFunction("dueDate",function($v,$project){
            $string = ($project->getDuedate())->format('Y-m-d');
            $lbl=new HtmlLabel("",$string);
            return $lbl;
        });
        return $dt;
    }
}