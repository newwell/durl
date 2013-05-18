<?php
$lang = array();
$lang['system_name']      = '华秦科技精品课程动态网站内容管理系统';
$lang['system_version']   = '1.0';
$lang['system_copyright'] = '版权所有 © 2007-2008 武汉华秦科技发展有限公司，并保留所有权利。';


#后台用户语言栏目
$lang['user_username_empty']         = "对不起,请填写用户名!";
$lang['user_password_empty']         = "对不起,请填写用户密码!";
$lang['user_access_denied']          = "对不起,您的用户名或密码错误!";
$lang['user_username_alreadyexist']  = "对不起,您填写的用户名已经存在了!";
$lang['user_username_notexist']      = "对不起,用户不存在!";
$lang['user_username_notmatch']      = "对不起,您填写的用户名未达到系统要求!";
$lang['user_password_notmatch']      = "对不起,您填写的密码未达到系统要求!";
$lang['user_user_notselected']       = "对不起,请选择您需要操作的用户!";
$lang['user_oldpassword_notmatch']   = "对不起,您填写的旧密码未达到系统要求!";
$lang['user_access_dined']           = "对不起,您没有该项操作的权限!";
$lang['user_del_sucess']             = '用户删除成功!';
$lang['user_reg_sucess']             = '用户添加成功!';
$lang['user_update_sucess']          = '用户资料更新成功!';
$lang['user_login_success']          = "登陆成功!";
$lang['user_unknow_error']           = '未知用户错误';
$lang['user_username']               = '用户名';
$lang['user_password']               = '密码';
$lang['user_old_password']           = '原密码';
$lang['user_level']                  = '管理员级别';
$lang['user_access']                 = '管理员权限分配';
$lang['user_level_supadmin']         = '超级管理员';
$lang['user_level_admin']            = '管理员';
$lang['user_college_admin']          = '院系管理员';
$lang['user_lastlogintime']          = '上次登陆时间';
$lang['user_lastloginip']            = '上次登陆IP';
$lang['user_userlist']               = '管理员列表';
$lang['user_add']                    = '添加管理员';
$lang['user_edit']                   = '管理员信息修改';
$lang['user_del']                    = '删除管理员';
$lang['user_userpassword_notmatch']  = '对不起，您填写的密码未达到系统要求！';





#后台数据库管理
$lang['database_list']                 = '数据库优化';
$lang['database_tablename']            = '数据表';
$lang['database_filename']             = '备份的文件名';
$lang['database_data_length']          = '数据库长度';
$lang['database_data_free']            = '碎片';
$lang['database_data_query']           = '运行SQL语句';
$lang['database_data_enter']           = '请在这里输入要运行的SQL语句';
$lang['database_data_execute']         = '运行SQL语句';
$lang['database_data_execute_empty']   = '请输入要运行的SQL语句';
$lang['database_data_execute_success'] = 'SQL语句运行成功';
$lang['database_rows']                 = '数据行数';
$lang['database_index']                = '索引';
$lang['database_optimize']             = '优化数据库';
$lang['database_optimizetable']        = '优化选中的数据表';
$lang['database_optimize_success']     = '数据表优化成功';
$lang['database_backuptable']          = '备份选中的数据表';
$lang['database_backup']               = '平台数据库备份';
$lang['database_backup_type']          = '备份类型';
$lang['database_backup_all']           = '备份全部数据表';
$lang['database_backup_custom']        = '自定义备份数据表';
$lang['database_backup_ziped']         = '备份文件压缩设定';
$lang['database_backup_ziped_none']    = '不压缩';
$lang['database_backup_ziped_each']    = '分卷文件分别压缩';
$lang['database_backup_ziped_all']     = '压缩为一个zip文件';
$lang['database_backup_upzip_success'] = '文件解压缩成功,系统将自动开始导入数据文件';
$lang['database_backup_packedsize']    = '分卷打包大小';
$lang['database_backup_backupoistion'] = '备份文件存放位置';
$lang['database_backup_remote']        = '备份到本地';
$lang['database_backup_server']        = '备份到服务器上';
$lang['database_backup_begin']         = '开始备份';
$lang['database_backup_error']         = '数据表备份失败,无法写入备份文件';
$lang['database_backup_success']       = '数据表备份成功';
$lang['database_backup_success_next']  = '数据表备份中,系统将自动刷新页面,请不要关闭本页面';
$lang['database_none_table']           = '请选择要操作的数据表';
$lang['database_backupfile_list']      = '已经备份文件列表';
$lang['database_backupfile_name']      = '备份文件名称';
$lang['database_backupfile_size']      = '备份文件大小';
$lang['database_backupfile_edittime']  = '修改时间';
$lang['database_restore']              = '还原数据库';
$lang['database_restore_del']          = '删除数据库备份文件';
$lang['database_restore_success']      = '数据库成功还原';
$lang['database_restore_begin']        = '数据表还原开始,目前还原的是第一部分的数据文件,系统将自动刷新页面还原后续部分,请不要关闭本页面';
$lang['database_restore_next']         = '数据表正在还原中,系统将自动刷新页面,请不要关闭本页面';
$lang['database_restore_fail']         = '数据库还原失败';
$lang['database_import_file_illegal']  = '输入的备份文件不是SQL文件';
$lang['database_not_backupfile']       = '输入的备份文件不存在';
$lang['database_backupfile_delsuccess']= '备份文件删除成功';
$lang['database_backupfile_delfail']   = '备份文件删除失败';
$lang['database_backup_sqlmode']       = '备份数据库文件兼容格式';
$lang['database_replace']              = '网站数据内容替换';
$lang['database_replace_search']       = '寻找的关键字';
$lang['database_replace_replace']      = '替换的关键字';
$lang['database_replace_success']      = '网站数据内容替换成功';


#后台模板管理
$lang['theme_main_class']                = '课程网站模板设置';
$lang['theme_main_declare']              = '网站模板设置';
$lang['theme_class_list']                = '网站模板列表';
$lang['theme_declare_list']              = '网站模板列表';
$lang['theme_choose']                    = '模板选择';
$lang['theme_class_img']                 = '网站模板缩略图';
$lang['theme_declare_img']               = '网站模板缩略图';
$lang['theme_title']                     = '模板名称';
$lang['theme_desc']                      = '模板详细介绍';
$lang['theme_dir_empty']                 = '该分类暂无模板';
$lang['theme_dir_open']                  = '展开所有分类';
$lang['theme_dir_close']                 = '关闭所有分类';
$lang['theme_click_close_window']        = '点击模板图片选中模板';
$lang['theme_index_position']            = '首页模块位置参考图';
$lang['theme_indexnum']                  = '调用条数';
$lang['theme_titlenum']                  = '标题字数';
$lang['theme_timeformat']                = '时间格式';
$lang['theme_img_empty']                 = '暂无预览图';


#系统设置

$lang['system_title']              = '系统参数设置';
$lang['system_safe_set']           = '系统安全设置';
$lang['system_webname']            = '网站名称';
$lang['system_webname_empty']      = '网站名称不能为空';
$lang['system_email']              = '网站传真';
$lang['system_email_empty']        = '网站名称不能为空';
$lang['system_phone']              = '网站电话';
$lang['system_address']            = '网站联系地址';
$lang['system_declarelevel_info']  = '网站地址';
$lang['system_close']              = '网站关闭';
$lang['system_close_reason']       = '网站关闭原因';
$lang['system_class_close']        = '课程网站登陆限制';
$lang['system_class_allclose']     = '关闭所有';
$lang['system_class_teacherclose'] = '允许课程负责人登陆';
$lang['system_class_allopen']      = '开启所有';
$lang['system_teacher_close']      = '课程修改关闭';
$lang['system_user_ip']            = '用户IP访问列表';
$lang['system_admin_ip']           = '管理员IP访问列表';
$lang['system_class_ip']           = '课程网站IP访问列表';
$lang['system_rewrite']            = '前台url重写设置';
$lang['system_rewrite_php']        = 'php重写';
$lang['system_rewrite_htaccess']   = '服务器重写';
$lang['system_rewrite_none']       = '不重写';
$lang['system_deletelog']          = '管理日志记录保持时间';
$lang['system_log_days']           = '后台管理日志默认保持时间';
$lang['system_log_days_notnum']    = '日志默认保持时间请填写数字';
$lang['system_setconfig_success']  = '网站设定保存成功';



#公用语言栏目
$lang['common_exit']         = '退出登陆';
$lang['common_index']         = '平台首页';
$lang['common_exit_success'] = '您已经成功退出登陆!';
$lang['common_unknow_action'] = '未知的操作!';
$lang['common_code_empty']   = '请填写验证码!';
$lang['common_code_error']   = '验证码错误!';
$lang['common_checkcode']    = '验证码';
$lang['common_enter']        = '进入管理中心';
$lang['common_operate']      = '操作';
$lang['common_edit']         = '提交';
$lang['common_del']          = '删除';
$lang['common_del_quite']    = '彻底删除';
$lang['common_resume']       = '恢复';
$lang['common_add']          = '提交';
$lang['common_order']        = '排序';
$lang['common_submit']       = '提交';
$lang['common_openthis']     = '展开';
$lang['common_select']       = '选择';
$lang['common_modify']       = '修改';
$lang['common_Stat']         = '统计信息';
$lang['common_none']         = '无';
$lang['common_fill_error']   = "对不起,您的填写有误!";
$lang['common_yes']          = "是";
$lang['common_no']           = "否";
$lang['common_garbage']      = "回收站";
$lang['common_open']         = "开启";
$lang['common_closed']       = "关闭";
$lang['common_accessdenied'] = "对不起,您的IP地址没有权限访问本系统";
$lang['common_days']         = "天";
$lang['common_number']       = "只可填写数字";
$lang['common_id_error']     = "请按照正确方式操作";
$lang['common_select_error'] = "没有找到您查找的信息";
$lang['common_department']   = "所属院系";
$lang['common_year']         = "精品课程年份";
$lang['common_unknow_action'] = "未知的操作";

#文件管理器语言栏
$lang['file_manage_list']  =  '用户文件列表';
$lang['file_add']          =  '文件上传';
$lang['file_add_ok']       =  '文件上传成功';
$lang['file_del_ok']       =  '文件删除成功';

#精品课程管理语言栏
$lang['siteclass']                           =  '精品课程管理';
$lang['department_see_class']                =  '按照院系查看';
$lang['siteclass_operate']                   =  '选择操作方式：';
$lang['siteclass_garbage']                   =  '课程回收站';
$lang['siteclass_title_empty']               =  '精品课程名称不能为空';
$lang['siteclass_dep']                       =  '下属系（学部）';
$lang['siteclass_add']                       =  '添加精品课程';
$lang['siteclass_add_success']               =  '精品课程添加成功';
$lang['siteclass_file_error']                =  '文件夹已经存在';
$lang['siteclass_file_list']                 =  '选择文件';
$lang['siteclass_add_ok']                    =  '精品课程添加成功';
$lang['siteclass_list']                      =  '选择查看方式：';
$lang['siteclass_list_year']                 =  '按照课程年份';
$lang['siteclass_list_grade']                =  '按照课程级别';
$lang['siteclass_list_department']           =  '按照院系查看';
$lang['siteclass_ClassName']                 =  '精品课程名称';
$lang['siteclass_year']                      =  '精品课程年份';
$lang['siteclass_type']                      =  '是否是外部链接';
$lang['siteclass_ensample']                  =  '例"http://www.51tek.com/course.asp",必须以"http://"开头';
$lang['siteclass_url']                       =  '链接地址';
$lang['siteclass_CourseGrade']               =  '课程级别';
$lang['siteclass_file']                      =  '课程文件夹';
$lang['siteclass_Unlock']                    =  '是否对校外发布';
$lang['siteclass_Locked']                    =  '是否锁定';
$lang['siteclass_ClassName_Ts']              =  '课程名称不超过40字';
$lang['siteclass_classname_empty']           =  '请填写课程名称';
$lang['siteclass_under']                     =  '院直属精品课程';
$lang['siteclass_DepartmentName_error']      =  '对不起，该课程已经存在';
$lang['siteclass_edit']                      =  '精品课程修改';
$lang['siteclass_edit_ok']                   =  '精品课程修改成功';
$lang['siteclass_del_ok']                    =  '精品课程删除成功';
$lang['siteclass_del_quite_ok']              =  '精品课程彻底删除成功';
$lang['siteclass_resume']                    =  '精品课程恢复成功';
$lang['siteclass_issuance']                  =  '发布精品课程';
$lang['siteclass_issuance_ok']               =  '精品课程发布成功';
$lang['siteclass_issuance_del']              =  '取消课程发布';
$lang['siteclass_issuance_del_ok']           =  '取消课程发布成功';
$lang['siteclass_issuance_cancel']           =  '取消发布';
$lang['siteclass_issuance_start']            =  '发布课程';
$lang['siteclass_teachername_empty']         =  '教师姓名不能为空';




#------------------------------教师部分--------------------------------#

$lang['teachercp_login']                        = '精品课程管理登录';
$lang['teachercp_enter']                        = '管理登录';
$lang['teachercp_site_not_exist']               = '您管理的网站不存在,请与管理员联系.';
$lang['teachercp_site_index']                   = '管理首页';
$lang['teachercp_site_base_info']               = '课程基本信息';
$lang['teachercp_site_name']                    = '课程名称';
$lang['teachercp_site_dep']                     = '所属院系';
$lang['teachercp_site_teacher']                 = '负责人';
$lang['teachercp_site_year']                    = '所属年份';
$lang['teachercp_class_templates']              = '课程网站模板';
$lang['teachercp_declare_templates']            = '网站模板';
$lang['teachercp_banner_img']                   = '网站首页BANNER图';
$lang['teachercp_index_module']                 = '网站首页模块调用';
$lang['teachercp_choose_templates']             = '模板选择';
$lang['teachercp_site_options']                 = '网站模板设置';
$lang['teachercp_site_name_empty']              = '请填写网站名称';
$lang['teachercp_site_class_empty']             = '请设定课程网站模板';
$lang['teachercp_site_declare_empty']           = '请设定申报网站模板';
$lang['teachercp_set_success']                  = '网站信息设定成功';
$lang['teachercp_index_num']                    = '网站首页栏目个数';
$lang['teachercp_index_content']                = '栏目内容';




#教师管理
$lang['teacher_manage']                 = '教师管理';
$lang['teacher_add']                    = '添加教师信息';
$lang['teacher_edit']                   = '修改教师信息';
$lang['teacher_username']               = '用户名';
$lang['teacher_img']                    = '教师图片';
$lang['teacher_type']                   = '教师类型';
$lang['teacher_type_FZ']                = '课程负责人';
$lang['teacher_type_ZJ']                = '主讲教师';
$lang['teacher_password']               = '密码';
$lang['teacher_name']                   = '教师姓名';
$lang['teacher_site']                   = '所属课程';
$lang['teacher_sex']                    = '性别';
$lang['teacher_age']                    = '年龄';
$lang['teacher_birth']                  = '出生年月';
$lang['teacher_diploma']                = '学历';
$lang['teacher_degree']                 = '学位';
$lang['teacher_jobname']                = '职称';
$lang['teacher_job']                    = '职务';
$lang['teacher_department']             = '所在院系';
$lang['teacher_phone']                  = '联系电话';
$lang['teacher_email']                  = '电子邮件';
$lang['teacher_fax']                    = '传真';
$lang['teacher_address']                = '联系地址';
$lang['teacher_target']                 = '研究方向';
$lang['teacher_teach']                  = '教学情况';
$lang['teacher_research']               = '学术研究';
$lang['teacher_hasnopic']               = '你还没有上传照片';





$lang['teacher_add_success']            = '教师信息添加成功';
$lang['teacher_edit_success']           = '教师信息修改成功';
$lang['teacher_del_success']            = '教师信息删除成功';
$lang['teacher_username_empty']         = '请填写教师的用户名';
$lang['teacher_username_not_matched']   = '教师用户名不符合系统安全要求';
$lang['teacher_password_empty']         = '请填写教师的密码';
$lang['teacher_password_not_matched']   = '教师密码不符合系统安全要求';
$lang['teacher_site_empty']             = '请选择教师的所属的课程';
$lang['teacher_age_must_number']        = '教师年龄必须是数字';
$lang['teacher_site_empty']             = '请选择教师所属课程';
$lang['teacher_email_invaid']           = '教师电子邮件地址格式不正确';
$lang['teacher_no_teacher_selected']    = '请选择要进行操作的教师';
$lang['teacher_not_exist']              = '您选择的教师不存在';
$lang['teacher_username_exist']         = '您填写的用户名已经被其他老师使用了';
$lang['teacher_ftp_path_error']         =  '对不起，FTP文件夹路径错误！';


#课程网站栏目管理
$lang['class_category_main']                         =  '课程网站栏目管理';
$lang['class_category_name']                         =  '课程网站栏目名称';
$lang['class_category_add']                          =  '添加一级栏目';
$lang['class_category_edit']                         =  '课程网站栏目修改';
$lang['class_category_name_not_empty']               =  '栏目名称不能为空';
$lang['class_category_listnum']                      =  '栏目排序号';
$lang['class_category_listnum_not_empty']            =  '栏目排序号不能为空';
$lang['class_category_listnum_int_only']             =  '栏目排序号只能是整数';
$lang['class_category_add_success']                  = '课程网站栏目添加成功';
$lang['class_category_edit_success']                 = '课程网站栏目修改成功';
$lang['class_category_del_success']                  = '课程网站栏目删除成功';
$lang['class_category_pnum_success']                 = '课程网站栏目排序成功';
$lang['class_category_type_teacher_only_ones']       = '您选择的教师风采栏目每个网站中只能设置一个';
$lang['class_category_type_book_only_ones']          = '您选择的网站留言栏目每个网站中只能设置一个';
$lang['class_category_id_empty']                     = '请选择栏目';
$lang['class_category_type']                         = '网站栏目类型';
$lang['class_category_type_cate']                    = '默认栏目类型';
$lang['class_category_type_url']                     = '外部超链接';
$lang['class_category_type_url_help']                = '外部超链接示例：http://www.51tek.net，"http://"不能缺少';
$lang['class_category_type_teacher']                 = '教师风采';
$lang['class_category_type_book']                    = '在线留言板';
$lang['class_module_type_test']              		 = '在线测试';
#申报网站
$lang['declare_category_main']                   =  '课程网站分类栏目管理';
$lang['declare_category_name']                   =  '申报网站栏目名称';
$lang['declare_category_add']                    =  '申报网站栏目添加';
$lang['declare_category_edit']                   =  '申报网站栏目修改';
$lang['declare_category_name_not_empty']         =  '栏目名称不能为空';
$lang['declare_category_listnum']                =  '分类栏目排序号';
$lang['declare_category_listnum_not_empty']      =  '栏目排序号不能为空';
$lang['declare_category_listnum_int_only']       =  '栏目排序号只能是整数';
$lang['declare_category_add_success']            = '栏目添加成功';
$lang['declare_category_edit_success']           = '栏目修改成功';
$lang['declare_category_del_success']            = '栏目删除成功';
$lang['declare_category_pnum_success']           = '栏目排序成功';
$lang['declare_category_id_empty']               = '请选择栏目';


#课程网站模块管理
$lang['class_module_index']                  = '网站模块管理';
$lang['class_module_list']                   = '网站模块列表';
$lang['class_module_all']                    = '所有栏目';
$lang['class_module_category']               = '所属栏目';
$lang['class_module_category_empty']         = '所属栏目不能为空';
$lang['class_module_name']                   = '模块名称';
$lang['class_module_name_empty']             = '模块名称不能为空';
$lang['class_module_listnum']                = '模块排序';
$lang['class_module_listnum_empty']          = '模块排序号不能为空';
$lang['class_module_type']                   = '模块类型';
$lang['class_module_type_simple']            = '独立页面';
$lang['class_module_type_news']              = '多信息列表';
$lang['class_module_type_download']          = '多信息下载';
$lang['class_module_type_video']             = '多信息视频';
$lang['class_module_type_course']            = '网络课堂';
$lang['class_module_type_teacher']           = '教师';
$lang['class_module_type_bbs']				 = '留言板';
$lang['class_module_type_sub']               = '模块分类';
$lang['class_module_type_module']            = '模块';
$lang['class_module_type_url']               = '外部链接';
$lang['class_module_type_empty']             = '模块类型不能为空';
$lang['class_module_type_error']             = '模块类型非法';
$lang['class_module_father']                 = '所属父模块';
$lang['class_module_not_has_father']         = '无父模块';
$lang['class_module_option']                 = '附加功能';
$lang['class_module_option_none']            = '无';
$lang['class_module_option_sort']            = '简短信息';
$lang['class_module_option_img']             = '标题图片';
$lang['class_module_option_both']            = '简短信息+标题图片';
$lang['class_module_option_empty']           = '模块类型不能为空';
$lang['class_module_option_error']           = '模块类型非法';
$lang['class_module_add']                    = '添加模块';
$lang['class_module_addchild']               = '添加子模块';
$lang['class_module_edit']                   = '修改模块';
$lang['class_module_add_success']            = '模块添加成功';
$lang['class_module_edit_success']           = '模块修改成功';
$lang['class_module_del_success']            = '模块删除成功';
$lang['class_module_pnum_success']           = '模块排序成功';
$lang['class_module_has_child']              = '该模块含有子模块,请删除或移动所有子模块后再删除该模块!';
$lang['class_module_edit_has_child']         = '该模块含有子模块,请删除或移动所有子模块后再修改该模块属性!';
$lang['class_module_category_empty']         = '对不起,您还未设置任何栏目,系统无法进行模块操作!';


#留言模块
$lang['sitebook']                    = '网站留言';
$lang['sitebook_list']               = '留言列表';
$lang['sitebook_name']               = '留言人';
$lang['sitebook_title']              = '留言标题';
$lang['sitebook_time']               = '留言时间';
$lang['sitebook_checked']            = '审核';
$lang['sitebook_checked_book']       = '审核留言';
$lang['sitebook_checked_yes']        = '已审核';
$lang['sitebook_checked_no']         = '未审核';
$lang['sitebook_hasreply_yes']       = '已回复';
$lang['sitebook_hasreply_no']        = '未回复';
$lang['sitebook_checked_ok']         = '审核成功';
$lang['sitebook_checked_error']      = '请选择要审核的留言';
$lang['sitebook_content']            = '留言内容';
$lang['sitebook_reply']              = '留言回复';
$lang['sitebook_reply_error']        = '请填写回复';
$lang['sitebook_reply_time']         = '回复时间';
$lang['sitebook_reply_success']      = '留言回复成功';
$lang['sitebook_del']                = '删除留言';
$lang['sitebook_del_ok']             = '删除成功';
$lang['sitebook_title_empty']        = '请填写留言主题';
$lang['sitebook_sender_empty']       = '请填写人名称';
$lang['sitebook_content_empty']      = '请填写留言内容';


#留言模块
$lang['simple_show']               = '编辑 ';
$lang['simple_title']              = '标题';
$lang['simple_SortContent']        = '简要信息';
$lang['simple_Content']            = '详细内容';
$lang['simple_edit_ok']            = '修改成功';


#内容模块
$lang['article_show_shortconent']          = '编辑简要信息';
$lang['article_simple_show']               = '编辑 ';
$lang['article_simple_title']              = '标题';
$lang['article_img']                       = '标题图片';
$lang['article_video_url']                 = '视频文件地址';
$lang['article_download_url']              = '文件地址';
$lang['article_old_img']                   = '原标题图片';
$lang['article_simple_title_bz']           = '20字符以内';
$lang['article_simple_SortContent']        = '简要信息';
$lang['article_simple_Content']            = '详细内容';
$lang['article_simple_edit_ok']            = '修改成功';
$lang['article_list']                      = '列表';
$lang['article_list_num']                  = '排序';
$lang['article_list_num_bz']               = '只能用0以上的数字';
$lang['article_list_title']                = '标题';
$lang['article_list_name']                 = '时间';
$lang['article_list_select']               = '列表信息';
$lang['article_addtime']                   = '添加时间';
$lang['article_add']                       = '添加信息';
$lang['article_add_ok']                    = '信息添加成功';
$lang['article_edit_ok']                   = '信息修改成功';
$lang['article_del_ok']                    = '信息删除成功';
$lang['article_pnum_ok']                   = '信息排序成功';
$lang['article_title_empty']               = '信息标题不能为空';
$lang['article_content_empty']             = '信息内容不能为空';
$lang['article_img_empty']                 = '图片不能为空';
$lang['article_video_empty']               = '视频地址不能为空';
$lang['article_file_empty']                = '文件地址不能为空';
$lang['article_not_exist']                 = '你要编辑的信息不存在!';
$lang['article_file_toolarge']             = '上传的文件超过了系统允许的大小!';
$lang['article_course_section']            = '下属节';
$lang['article_course_point']              = '下属点';
$lang['article_course_title_chapter']      = '章标题';
$lang['article_course_title_section']      = '节标题';
$lang['article_course_title_point']        = '点标题';
$lang['article_course_add_chapter']        = '添加章';
$lang['article_course_add_section']        = '添加节';
$lang['article_course_add_point']          = '添加点';
$lang['article_add_content']               = '是否有内容';
$lang['article_empty']                     = '请选择要操作的信息';



#友情链接
$lang['friendlink']                    = '友情链接';
$lang['friendlink_friend']             = '友情链接设置';
$lang['friendlink_res']                = '国外优秀教学资源';
$lang['friendlink_down']               = '软件下载管理';
$lang['friendlink_list']               = '链接列表';
$lang['friendlink_add']                = '添加链接';
$lang['friendlink_edit']               = '修改链接';
$lang['friendlink_pnum']               = '链接排序';
$lang['friendlink_title']              = '链接名称';
$lang['friendlink_url']                = '链接地址';
$lang['friendlink_picurl']             = '链接图片地址';
$lang['friendlink_type']               = '链接类型';
$lang['friendlink_type_text']          = '文字链接';
$lang['friendlink_type_img']           = '图片链接';
$lang['friendlink_add_success']        = '链接添加成功';
$lang['friendlink_edit_success']       = '链接修改成功';
$lang['friendlink_del_success']        = '链接删除成功';
$lang['friendlink_pnum_success']       = '链接排序成功';
$lang['friendlink_title_empty']        = '链接名称不能为空';
$lang['friendlink_url_empty']          = '链接地址不能为空';
$lang['friendlink_picurl_empty']       = '链接图片地址不能为空';
$lang['friendlink_not_exist']          = '您操作的链接不存在';
#网站计数器
$lang['counter_not_exist']          = '您操作的计数器不存在';
$lang['counter_url_empty']          = '计数器不能为空';
$lang['counter_edit_success']       = '计数器修改成功';

#网络课程
$lang['course_chapter']           = '章';
$lang['course_section']           = '节';
$lang['course_point']             = '点';
$lang['course_title']             = '名称';
$lang['course_level']             = '级别';
$lang['course_has_scontent']      = '是否含有下属内容';
$lang['course_has_info']          = '是否含有文字内容';
$lang['course_fatcher']           = '所属章/节';
$lang['course_pnum']              = '排序';
$lang['course_add_chapter']       = '添加章';
$lang['course_add_section']       = '添加下属节';
$lang['course_add_point']         = '添加下属点';
$lang['course_point_content']     = '管理内容';
$lang['course_info']              = '简介内容';
$lang['course_title_empty']       = '对不起,名称不能为空';
$lang['course_add_success']       = '添加成功';
$lang['course_del_success']       = '删除成功';
$lang['course_point_info']        = '点内容';
$lang['course_word_upload']       = '导入Word';

#申报网站
$lang['declare']              = '申报网站栏目列表';
$lang['declare_alreadyexist'] = '对不起，该栏目已经存在！';
$lang['declare_nonentity']    = '对不起，该栏目不存在！';
$lang['declare_add']          = '申报栏目添加';
$lang['declare_add_ok']       = '栏目添加成功';
$lang['declare_farther']      = '所属栏目';
$lang['declare_title']        = '栏目名称';
$lang['declare_del_ok']       = '栏目删除成功';
$lang['declare_edit']         = '申报栏目修改';
$lang['declare_edit_ok']      = '修改栏目成功';
$lang['commenton_add']         = '评审指标添加';


#帮助提示性信息
$lang['help_enter_result']     = '请输入左侧图片中表达式的结果';
$lang['help_press_ctrl_mutil_select']     = '按住Ctrl键后可选择多个项目';
#网站系统帮助信息设置
$lang['help_press_enter_admin_writing']   = '*设置可以访问的管理员的IP，按Enter将多个管理员IP隔开';
$lang['help_press_enter_user_writing']    = '*设置可以访问的用户IP，按Enter将多个用户IP隔开';
$lang['help_press_enter_class_writing']    = '*设置课程网站可以访问的用户IP，按Enter将多个课程网站用户IP隔开';
$lang['help_delete_log']                  = '*日志在两天之内将继续保存';
$lang['help_show_system_name']            = '*网站名称，将显示在前台首页标题中';
$lang['help_show_system_phone']       	  = '*网站电话，将显示在页面首页的联系方式处';
$lang['help_show_system_adress']          = '*网站地址，将显示在页面首页的联系地址处';
$lang['help_show_system_email']           = '*网站传真，将显示在页面首页的网站传真处';
$lang['help_show_system_site_close']      = '*暂时将网站关闭，其他人无法访问，但不影响管理员访问';
$lang['help_show_system_class_close']     = '*暂时将课程网站关闭，其他人无法访问，但不影响管理员访问';
$lang['help_show_system_close_info']      = '*网站关闭时出现的提示信息';
$lang['help_show_system_declaresite']     = '*点击选择申报网站模板';
#管理员管理帮助信息设置
$lang['help_admin_name_not_modify']          = '*用户名不允许修改';
$lang['help_admin_pwd_not_modify']           = '*不更新密码请勿填写';
$lang['help_admin_modify_pwd']               = '*修改密码必须填写原密码';
$lang['help_dif_admin_todo']                 = '*选择超级管理员，该后台中的所有操作他都可以进行，而管理员则只具备一定的权限';
#关于数据库的操作
$lang['help_databasebackup_do']              = '*根据需要备份数据';
$lang['help_databasebackup_save_each']       = '*分卷备份 - 每个分卷文件大小限制(kb)';
$lang['help_checkall_alloptions']            = '全选';
$lang['help_query_sql']                      = '*输入要执行的SQL语句，看能否执行正确';
#院系管理
$lang['help_is_selected']                    = '*院系所属的上级单位,不选择则为校直属单位';
$lang['help_isempty_deparment_names']        = '*请填写网站栏目名称';
$lang['help_isselected_lanmu']               = '*请选择该栏目所属的上级栏目,不选则为顶级栏目';
$lang['help_isempty_zhibiaoname']            = '*请填写指标名称';
$lang['help_isempty_zhibiaopoint']           = '*指标分值必须是正整数';
#网络课堂
$lang['help_add_course_limits']              = '*如果您选择否，将不能添加该章下面的节或点';
$lang['help_add_course_info']                = '*选择是,您可以为该节点输入相关文字内容,选择否,则该节点不含有任何文字内容';
$lang['help_is_empty']                       = '*允许为空！';
$lang['help_not_empty']                      = '*不允许为空！';
$lang['help_course_add']                     = '*前方带有箭头的下属院系';
$lang['help_is_issue']                       = '*选择否不对外公开';
$lang['help_is_selected_year']               = '*请选择精品课程年份';
$lang['help_is_selected_leval']              = '*请选择精品课程及级别';
#添加老师
$lang['help_limit_username']                 = '*用户名必须为4-19个字母数字和下划线组成';
$lang['help_limit_userpwd']                  = '*密码必须为6-19个字母数字和下划线组成';
$lang['help_limit_name']                     = '*该项只能输入中文';
$lang['help_limit_age']                      = '*该项只能是数字';
$lang['help_limit_birth']                    = '*该项不能为空且不能有空格';
$lang['help_limit_email']                    = '*请填写正确的电子邮箱格式';
$lang['help_edit_no']                        = '不修改请不要填写';
#评审教师
$lang['help_is_department_selected']         = '*请选择评审教师所属学院';
#信息管理
$lang['help_isempty_title']                  = '*请填写信息标题';
$lang['help_is_selected_type']               = '*请选择信息类型';
#系统设置——老师
$lang['help_teacher_system_name']                = '*网站名称，显示在网站的Logo上面';
$lang['help_teacher_system_select_coursesite']   ='*点击选择课程网站模板';
$lang['help_teacher_system_select_claresite']    = '*点击选择申报网站模板';
$lang['help_teacher_system_select_bannerimg']    = '*点击浏览选择网站图标';
$lang['help_teacher_system_lanmu']               = '*请填写课程网站一级栏目名称';
$lang['help_teacher_system_lanmutype']           ='*请选择栏目类型，栏目类型含义见下方具体说明';
$lang['help_teacher_imgsize']                 ='*建议照片大小250*300像素';
#关于模块
$lang['help_isempty_moudel']                     = '*请填写模块名称';
$lang['help_selected_moudeltype']                = '*请选择模块所属栏目';
$lang['help_selected_moudelcategory']            = '*请选择模板类型';
$lang['help_selected_fmoudel']                   = '*请选择父模块';
$lang['help_selected_fujia']                     = '*请选择附加功能，默认为无';


#电子教案
$lang['kinescope_teacher_name']                     = '教师姓名';
$lang['kinescope_teacher_photo']                    = '教师照片';
$lang['kinescope_schoolteaching_content']           = '授课内容';
$lang['kinescope_upload']                           = '上传录像';
$lang['kinescope_intro']                            = '录像介绍';
$lang['kinescope_time']                             = '录像时长';
$lang['kinescope_pnum']                             = '排序';
$lang['kinescope_add']                              = '添加课程录像';
$lang['kinescope_list_nav']                         = '<a href="?action=index">课程管理首页</a> > 申报网站管理 > 课程录像 > 录像列表';
$lang['kinescope_add_nav']                          = '<a href="?action=index">课程管理首页</a> > 申报网站管理 > 课程录像 > 录像添加';
$lang['kinescope_edit_nav']                         = '<a href="?action=index">课程管理首页</a> > 申报网站管理 > 课程录像 > 录像修改';
$lang['kinescope_teachername_empty']                = '教师姓名不能为空';
$lang['kinescope_add_success']                      = '课程录像添加成功';
$lang['kinescope_edit_success']                     = '课程录像修改成功';
$lang['electron_id_empty']                          = '请选择您要删除的电子教案';
$lang['electron_del_ok'] 							= '删除成功';
$lang['electron_pnum_ok']                           = '排序已更新';

$lang['file_select']                                = '文件选择';
$lang['file_upload']                                = '文件上传';




$lang['vote'] = '网站投票管理';
$lang['vote_list']       = '网站投票列表';
$lang['vote_item_list']  = '投票项目列表';
$lang['vote_add']   = '投票题目添加';
$lang['vote_add_success']   = '投票题目添加成功';
$lang['vote_edit']  = '投票题目修改';
$lang['vote_edit_success']  = '投票题目修改成功';
$lang['vote_del_succes']   = '投票删除成功';
$lang['vote_title'] = '网站投票题目';
$lang['vote_type']  = '网站投票方式';
$lang['vote_type_single']  = '单选';
$lang['vote_type_multi']   = '多选';
$lang['vote_showindex']    = '前台可见';
$lang['vote_showindex_set']    = '设定前台可见';
$lang['vote_showindex_cancel'] = '取消前台可见';
$lang['vote_showindex_set_success']  = '设定前台可见成功';
$lang['vote_showindex_cancel_success']       = '取消前台可见成功';
$lang['vote_item']         = '投票选项';
$lang['vote_item_count']   = '选项票数';
$lang['vote_item_add']     = '选项添加';
$lang['vote_item_info']    = '选项内容';
$lang['vote_item_add_success']  = '选项添加成功';
$lang['vote_item_edit']    = '选项修改';
$lang['vote_item_edit_success']  = '选项修改成功';
$lang['vote_item_del_success']   = '选项删除成功';
$lang['vote_view']  = '查看投票';

$lang['question']       = '对不起,题目不能为空';
$lang['answer']       = '对不起,答案不能为空';
$lang['types']       = '对不起,选择方式不能为空';
$lang['select_del_ok']       = '题目删除成功';
$lang['question_add_success']       = '题目添加成功';
$lang['question_edit_success']       = '题目修改成功';
$lang['question_judge_right']       = '正确';
$lang['question_judge_error']       = '错误';

#---------------考试-----------------
$lang['exam_create']		 =		'自动组卷'; 
?>