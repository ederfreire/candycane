<?php
/**
 * users.php
 *
 * status = 1 // active
 * status = 2 // registered
 * status = 3 // locked
 */

/**
 * UsersHelper
 *
 */
class UsersHelper extends AppHelper
{
  var $helpers = array('Html');

  /**
   * change_status_link
   *
   */
  function change_status_link($user)
  {
    if (isset($user['User'])) {
      $user = $user['User'];
    }

    # url = {:action => 'edit', :id => user, :page => params[:page], :status => params[:status]}
    $url = array(
      'action' => 'edit',
      'id' => $user,
      //'page' => $this->params['url']['page'],
      //'status' => $this->params['url']['status'],
    );

    // user status locked
    if ($user['status'] == 3) {
      return $this->Html->link(__('Unlock', true), '/users/edit/' . $user['id'], array('class' => 'icon icon-unlock'));
      // return $this->Html->link(__('button_unlock', true), '/users/edit/' . $user['id'], array('class' => 'icon icon-unlock'));
    // user registered
    } else if ($user['status'] == 2) {
      return $this->Html->link(__('Activate', true), '/users/edit/' . $user['id'], array('class' => 'icon icon-unlock'));
    } else {
      return $this->Html->link(__('Lock', true), '/users/edit/' . $user['id'], array('class' => 'icon icon-lock'));
    }

    # if user.locked?
    #   link_to l(:button_unlock), url.merge(
    #     :user => {:status => User::STATUS_ACTIVE}),
    #     :method => :post,
    #     :class => 'icon icon-unlock'
    # elsif user.registered?
    #   link_to l(:button_activate), url.merge(
    #     :user => {:status => User::STATUS_ACTIVE}),
    #     :method => :post,
    #     :class => 'icon icon-unlock'
    # elsif user != User.current
    #   link_to l(:button_lock), url.merge(
    #   :user => {:status => User::STATUS_LOCKED}),
    #   :method => :post,
    #   :class => 'icon icon-lock'
    # end
  }
 
}
