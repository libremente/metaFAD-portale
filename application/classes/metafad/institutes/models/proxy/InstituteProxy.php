<?php
class metafad_institutes_models_proxy_InstituteProxy extends GlizyObject
{
    public function findTerm($fieldName, $model, $query, $term, $proxyParams)
    {
        $result = array();

        $it = org_glizy_objectFactory::createModelIterator('metafad.institutes.models.Model')
            ->where('institute_name','%'.$term.'%','ILIKE');

        foreach ($it as $ar) {
            $result[] = array(
                'id' => $ar->institute_id,
                'text' => $ar->institute_name,
            );
        }

        return $result;
    }

    public function getInstituteVoByKey($instituteKey)
    {
        $ar = org_glizy_objectFactory::createModel('metafad.institutes.models.Model');
        $ar->find(array('institute_key' => $instituteKey));
        return $ar->getValues();
    }

    public function getInstituteVoByName($instituteName)
    {
        $ar = org_glizy_objectFactory::createModel('metafad.institutes.models.Model');
        $ar->find(array('institute_name' => $instituteName));
        return $ar->getValues();
    }

    public function getInstituteVoById($id)
    {
        $ar = org_glizy_objectFactory::createModel('metafad.institutes.models.Model');
        $ar->find(array('institute_id' => $id));
        return $ar->getValues();
    }

    public function getInstituteConfigByKey($instituteKey)
    {
        $ar = org_glizy_objectFactory::createModel('metafad.institutes.models.Model');
        $ar->find(array('institute_key' => $instituteKey));
        $institutes = org_glizy_objectFactory::createModelIterator('metafad.modules.institutesManagement.models.Model')
        				->load('getById',array('institute_id'=>$ar->institute_id));

        if ($institutes->count()) {
        	return $institutes->first()->getRawdata();
        }
    }

    public function getAllInstitutes()
    {
        $result = array();

        $it = org_glizy_objectFactory::createModelIterator('metafad.institutes.models.Model');

        foreach ($it as $ar) {
            $result[] = array(
                'id' => $ar->institute_id,
                'key' => $ar->institute_key,
                'text' => $ar->institute_name,
            );
        }

        return $result;
    }
}
