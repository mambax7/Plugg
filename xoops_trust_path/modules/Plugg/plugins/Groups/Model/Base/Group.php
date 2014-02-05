<?php
/*
This file has been generated by the Sabai scaffold script. Do not edit this file directly.
If you need to customize the class, use the following file:
plugins/Groups/Model/Group.php
*/
abstract class Plugg_Groups_Model_Base_Group extends Sabai_Model_Entity
{
    public function __construct(Sabai_Model $model)
    {
        parent::__construct('Group', $model);
        $this->_vars = array('group_id' => 0, 'group_created' => 0, 'group_updated' => 0, 'group_name' => null, 'group_display_name' => null, 'group_description' => null, 'group_description_html' => null, 'group_description_filter_id' => 0, 'group_type' => 0, 'group_avatar' => null, 'group_avatar_medium' => null, 'group_avatar_thumbnail' => null, 'group_avatar_icon' => null, 'group_status' => 0, 'group_user_id' => 0, 'group_member_count' => 0, 'group_member_last' => 0, 'group_member_lasttime' => 0);
    }

    public function __clone()
    {
        $this->_vars = array_merge($this->_vars, array('group_id' => 0, 'group_created' => 0, 'group_updated' => 0, 'group_member_count' => 0, 'group_member_last' => 0, 'group_member_lasttime' => 0));
    }

    public function __toString()
    {
        return $this->_get('name', null, null);
    }

    public function assignUser($user, $markDirty = true)
    {
        $this->_set('user_id', $user->id, $markDirty);
        return $this;
    }

    protected function _fetchUser($withData = false)
    {
        if (!isset($this->_objects['User'])) {
            $this->_objects['User'] = $this->_model->User_Identity($this->_vars['group_user_id'], $withData);
        }

        return $this->_objects['User'];
    }

    public function isOwnedBy($user)
    {
        return $this->user_id && $this->user_id == $user->id;
    }

    public function addMember(Plugg_Groups_Model_Member $entity)
    {
        $this->_addEntity($entity);
        return $this;
    }

    public function removeMember(Plugg_Groups_Model_Member $entity)
    {
        return $this->removeMemberById($entity->id);
    }

    public function removeMemberById($id)
    {
        return $this->_removeEntityById('member_id', 'Member', $id);
    }

    public function createMember()
    {
        return $this->_createEntity('Member');
    }

    protected function _fetchMembers($limit = 0, $offset = 0, $sort = null, $order = null)
    {
        return $this->_fetchEntities('Member', $limit, $offset, $sort, $order);
    }

    protected function _fetchLastMember()
    {
        if (!isset($this->_objects['LastMember']) && $this->hasLastMember()) {
            $this->_objects['LastMember'] = $this->_fetchEntities('Member', 1, 0, 'member_created', 'DESC')->getFirst();
        }
        return $this->_objects['LastMember'];
    }

    public function paginateMembers($perpage = 10, $sort = null, $order = null)
    {
        return $this->_paginateEntities('Member', $perpage, $sort, $order);
    }

    public function removeMembers()
    {
        return $this->_removeEntities('Member');
    }

    public function countMembers()
    {
        return $this->_countEntities('Member');
    }

    public function addActivewidget(Plugg_Groups_Model_Activewidget $entity)
    {
        $this->_addEntity($entity);
        return $this;
    }

    public function removeActivewidget(Plugg_Groups_Model_Activewidget $entity)
    {
        return $this->removeActivewidgetById($entity->id);
    }

    public function removeActivewidgetById($id)
    {
        return $this->_removeEntityById('activewidget_id', 'Activewidget', $id);
    }

    public function createActivewidget()
    {
        return $this->_createEntity('Activewidget');
    }

    protected function _fetchActivewidgets($limit = 0, $offset = 0, $sort = null, $order = null)
    {
        return $this->_fetchEntities('Activewidget', $limit, $offset, $sort, $order);
    }

    protected function _fetchLastActivewidget()
    {
        if (!isset($this->_objects['LastActivewidget']) && $this->hasLastActivewidget()) {
            $this->_objects['LastActivewidget'] = $this->_fetchEntities('Activewidget', 1, 0, 'activewidget_created', 'DESC')->getFirst();
        }
        return $this->_objects['LastActivewidget'];
    }

    public function paginateActivewidgets($perpage = 10, $sort = null, $order = null)
    {
        return $this->_paginateEntities('Activewidget', $perpage, $sort, $order);
    }

    public function removeActivewidgets()
    {
        return $this->_removeEntities('Activewidget');
    }

    public function countActivewidgets()
    {
        return $this->_countEntities('Activewidget');
    }

    protected function _get($name, $sort, $order, $limit = 0, $offset = 0)
    {
        switch ($name) {
        case 'id':
            return $this->_vars['group_id'];
        case 'created':
            return $this->_vars['group_created'];
        case 'updated':
            return $this->_vars['group_updated'];
        case 'name':
            return $this->_vars['group_name'];
        case 'display_name':
            return $this->_vars['group_display_name'];
        case 'description':
            return $this->_vars['group_description'];
        case 'description_html':
            return $this->_vars['group_description_html'];
        case 'description_filter_id':
            return $this->_vars['group_description_filter_id'];
        case 'type':
            return $this->_vars['group_type'];
        case 'avatar':
            return $this->_vars['group_avatar'];
        case 'avatar_medium':
            return $this->_vars['group_avatar_medium'];
        case 'avatar_thumbnail':
            return $this->_vars['group_avatar_thumbnail'];
        case 'avatar_icon':
            return $this->_vars['group_avatar_icon'];
        case 'status':
            return $this->_vars['group_status'];
        case 'user_id':
            return $this->_vars['group_user_id'];
        case 'member_count':
            return $this->_vars['group_member_count'];
        case 'member_last':
            return $this->_vars['group_member_last'];
        case 'member_lasttime':
            return $this->_vars['group_member_lasttime'];
        case 'Members':
            return $this->_fetchMembers($limit, $offset, $sort, $order);
        case 'LastMember':
            return $this->_fetchLastMember();
        case 'Activewidgets':
            return $this->_fetchActivewidgets($limit, $offset, $sort, $order);
        case 'LastActivewidget':
            return $this->_fetchLastActivewidget();
        case 'User':
            return $this->_fetchUser();
        case 'UserWithData':
            return $this->_fetchUser(true);
default:
return isset($this->_objects[$name]) ? $this->_objects[$name] : null;
        }
    }

    protected function _set($name, $value, $markDirty)
    {
        switch ($name) {
        case 'id':
            $this->_setVar('group_id', $value, $markDirty);
            break;
        case 'name':
            $this->_setVar('group_name', $value, $markDirty);
            break;
        case 'display_name':
            $this->_setVar('group_display_name', $value, $markDirty);
            break;
        case 'description':
            $this->_setVar('group_description', $value, $markDirty);
            break;
        case 'description_html':
            $this->_setVar('group_description_html', $value, $markDirty);
            break;
        case 'description_filter_id':
            $this->_setVar('group_description_filter_id', $value, $markDirty);
            break;
        case 'type':
            $this->_setVar('group_type', $value, $markDirty);
            break;
        case 'avatar':
            $this->_setVar('group_avatar', $value, $markDirty);
            break;
        case 'avatar_medium':
            $this->_setVar('group_avatar_medium', $value, $markDirty);
            break;
        case 'avatar_thumbnail':
            $this->_setVar('group_avatar_thumbnail', $value, $markDirty);
            break;
        case 'avatar_icon':
            $this->_setVar('group_avatar_icon', $value, $markDirty);
            break;
        case 'status':
            $this->_setVar('group_status', $value, $markDirty);
            break;
        case 'user_id':
            $this->_setVar('group_user_id', $value, $markDirty);
            break;
        case 'member_count':
            $this->_setVar('group_member_count', $value, $markDirty);
            break;
        case 'member_last':
            $this->_setVar('group_member_last', $value, $markDirty);
            break;
        case 'member_lasttime':
            $this->_setVar('group_member_lasttime', $value, $markDirty);
            break;
        case 'Members':
            $this->removeMembers();
            foreach (array_keys($value) as $i) {
                $this->addMember($value[$i]);
            }
            break;
        case 'Activewidgets':
            $this->removeActivewidgets();
            foreach (array_keys($value) as $i) {
                $this->addActivewidget($value[$i]);
            }
            break;
        }
    }

    protected function _initVar($name, $value)
    {
        switch ($name) {
        default:
            $this->_vars[$name] = $value;
            break;
        }
    }
}

abstract class Plugg_Groups_Model_Base_GroupRepository extends Sabai_Model_EntityRepository
{
    public function __construct(Sabai_Model $model)
    {
        parent::__construct('Group', $model);
    }

    public function fetchByUser($id, $limit = 0, $offset = 0, $sort = null, $order = null)
    {
        return $this->_fetchByForeign('group_user_id', $id, $limit, $offset, $sort, $order);
    }

    public function paginateByUser($id, $perpage = 10, $sort = null, $order = null)
    {
        return $this->_paginateByEntity('User', $id, $perpage, $sort, $order);
    }

    public function countByUser($id)
    {
        return $this->_countByForeign('group_user_id', $id);
    }

    public function fetchByUserAndCriteria($id, Sabai_Model_Criteria $criteria, $limit = 0, $offset = 0, $sort = null, $order = null)
    {
        return $this->_fetchByForeignAndCriteria('group_user_id', $id, $criteria, $limit, $offset, $sort, $order);
    }

    public function paginateByUserAndCriteria($id, Sabai_Model_Criteria $criteria, $perpage = 10, $sort = null, $order = null)
    {
        return $this->_paginateByEntityAndCriteria('User', $id, $criteria, $perpage, $sort, $order);
    }

    public function countByUserAndCriteria($id, Sabai_Model_Criteria $criteria)
    {
        return $this->_countByForeignAndCriteria('group_user_id', $id, $criteria);
    }

    protected function _getCollectionByRowset(Sabai_DB_Rowset $rs)
    {
        return new Plugg_Groups_Model_Base_GroupsByRowset($rs, $this->_model->create('Group'), $this->_model);
    }

    public function createCollection(array $entities = array())
    {
        return new Plugg_Groups_Model_Base_Groups($this->_model, $entities);
    }
}

class Plugg_Groups_Model_Base_GroupsByRowset extends Sabai_Model_EntityCollection_Rowset
{
    public function __construct(Sabai_DB_Rowset $rs, Plugg_Groups_Model_Group $emptyEntity, Sabai_Model $model)
    {
        parent::__construct('Groups', $rs, $emptyEntity, $model);
    }

    protected function _loadRow(Sabai_Model_Entity $entity, array $row)
    {
        $entity->initVars($row);
    }
}

class Plugg_Groups_Model_Base_Groups extends Sabai_Model_EntityCollection_Array
{
    public function __construct(Sabai_Model $model, array $entities = array())
    {
        parent::__construct($model, 'Groups', $entities);
    }
}