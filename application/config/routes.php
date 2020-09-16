<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['U']='Userc/index/0';
$route['afterRegister']='Userc/main';
$route['login/(:num)']='Userc/login/flagRegister';
$route['registerPage']='Registerc/index';
$route['register']="Registerc/register";
$route['testuser']="User2c/expense";
$route['logout']="logout/index";
$route['attendance']="attendance/index";
$route['expense']="expense/index";
$route['contri']="expense/contribution";
$route['profile']="profile/index";
$route['inbox']="mailboxc/inbox";
$route['send']="mailboxc/send";
$route['gum']="getUnreadMessages/index";
$route['gum2']="getUnreadMessages/user";
$route['sendMessage']="sendMessages/index";
$route['showMessage/(:num)']="showMessage/index/mssgId";
$route['password']="changeUserPassword/index";
$route['checkPassword/(:any)']="checkPassword/index/password";
$route['change']="changeUserPassword/change";
$route['update']="updateUser/index";
$route['admin']="Userc/loadPage";
$route['adminLogin']="userc/adminLogin";
$route['testAdmin']="admin/index";
$route['adminExpense']="expense/adminExpense";
$route['addItemPage']="expense/addItemPage";
$route['fundType/(:num)']="fundType/index/option";
$route['addItem']="expense/addItem";
$route['addExpense']="expense/addExpense";
$route['addExpenseDetail']="expense/addExpenseDetail";
$route['expenseType']="expense/expenseType";
$route['viewCont']="expense/viewCont";
$route['addUser']="addUser/index";
$route['aud']="addUser/addUserInfo";
$route['adminAtte']="attendance/adminAtte";
$route['fetchReport/(:num)']="attendance/fetchReport/id";
$route['permission']="permissions/index";
$route['ajaxPermission/(:num)']="Permissions/ajaxPermission/id";
$route['submitPerm']="Permissions/permissions";

$route['auth']="authenticate/index";
$route['active']="authenticate/active";
$route['allusers']="authenticate/allusers";


$route['ajaxAuth/(:num)']="authenticate/ajaxAuthenticate/id";
$route['submitAuth']="authenticate/submitAuth";
$route['logoutAdmin']="logoutAdmin/index";
$route['testadmin']="admin/index";
$route['deleteUser/(:num)']="deleteUser/index/id";
$route['mailboxAdmin']="mailboxc/adminInbox";
$route['sendAdmin']="mailboxc/sendAdmin";
$route['broadcast']="mailboxc/broadcast";
$route['sendAll']="mailboxc/sendAll";
$route['showMessageAdmin/(:num)']="showMessage/indexAdmin/id";
$route['sendMessageByAdmin']="mailboxc/sendMessage";
$route['sendMessageByUser']="mailboxc/sendMessageUser";
$route['forgotPasswordUser']="userc/forgotPasswordUser";
$route['loadForgotPassword']="userc/Forgot";
$route['reply/(:num)']="mailboxc/reply/id";
$route['replyAdmin/(:num)']="mailboxc/replyAdmin/id";
$route['search']="admin/search";
$route['searchActive']="admin/searchActive";
$route['searchInactive']="admin/searchInactive";
$route['confirmContri/(:num)']="expense/confirmContri/idTemp";

$route['downloadExpense']="expense/downloadExpense";
$route['downloadContri']="expense/downloadContri";
$route['downloadUserContri']="expense/downloadUserContri";
$route['sample']="userc/sample";
$route['downloadAtte/(:num)']="attendance/downloadAtte/id";

