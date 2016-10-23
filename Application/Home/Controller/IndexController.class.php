<?php
namespace Home\Controller;
use Think\Controller;
use Think\Model;
class IndexController extends Controller {
    public function index(){
    	$Form = new Model();
    	$hosts = $Form->query('select id, address, updated_at from hosts order by id');
    	$this->hosts = $hosts;
    	$this->assign("list",$hosts);
    	$this->display();
    }

    public function services(){
    	//dump($_GET['id']);
    	$id = I('get.id');
    	$Form = new Model();
    	$services = $Form->query('select * from services where host_id=%d and length(name)>0 order by port',$id);
    	//dump($notes);
    	$this->services = $services;
    	$this->assign("list",$services);
    	$this->display();
    }

    public function infos(){
		//dump($_GET['id']);
		$id = I('get.id');
    	$Form = new Model();
    	
        //get MGMT modules notes
        //get notes for sap_mgmt_con_version
        $version = $Form->query("select updated_at, data from notes 
            where host_id = %d and ntype in ('SAP ID','SAP Version')", $id);
        foreach ($version as $key => $value) {
            $version[$key]['data'] = base64_decode($value['data']);
        }
        $this->version = $version;
        $this->assign("version",$version);

        //get notes for sap_mgmt_con_getenv
        $env = $Form->query("select updated_at, data from notes 
            where host_id = %d and ntype in ('sap.env')", $id);
        foreach ($env as $key => $value) {
            $env[$key]['data'] = base64_decode($value['data']);
        }
        $this->env = $env;
        $this->assign("env",$env);

        //get notes for sap_mgmt_con_extractusers
        $users = $Form->query("select updated_at, data from notes 
            where host_id = %d and ntype in ('sap.users')", $id);
        foreach ($users as $key => $value) {
            $users[$key]['data'] = base64_decode($value['data']);
        }
        $this->users = $users;
        $this->assign("users",$users);

        //get notes for sap_mgmt_con_instanceproperties
        $instance = $Form->query("select updated_at, data from notes 
            where host_id = %d and ntype in 
                ('sap.sapsystem',
                'sap.systemname',
                'sap.localhost',
                'sap.instancename',
                'sap.icm.url',
                'sap.igs.url',
                'sap.dbstring',
                'sap.j2eedbstring',
                'sap.protected.web.methods',
                'sap.web.methods')", $id);
        foreach ($instance as $key => $value) {
            $instance[$key]['data'] = base64_decode($value['data']);
        }
        $this->instance = $instance;
        $this->assign("instance",$instance);

        //get loots for sap_mgmt_con_getprocessparameters
        $process = $Form->query("select updated_at, path, 'Process Parameters' as info from loots 
            where host_id = %d and ltype in ('sap.getprocessparameters')", $id);
        $this->process = $process;
        $this->assign("process",$process);

        //get loots for sap_mgmt_con_startprofile
        $profile = $Form->query("select updated_at, path, info from loots 
            where host_id = %d and ltype in ('sap.profile')", $id);
        $this->profile = $profile;
        $this->assign("profile",$profile);

        //get loots for sap_mgmt_con_abapsyslog
        $abapsyslog = $Form->query("select updated_at, path, info from loots 
            where host_id = %d and ltype in ('sap.abap.syslog')", $id);
        $this->abapsyslog = $abapsyslog;
        $this->assign("abapsyslog",$abapsyslog);

        //get loots for sap_mgmt_con_getlogfiles
        $logfiles = $Form->query("select updated_at, path, info from loots 
            where host_id = %d and ltype in ('sap.tracefile.file','sap.logfile.file')", $id);
        $this->logfiles = $logfiles;
        $this->assign("logfiles",$logfiles);

        //get SOAP RFC modules notes
        //get notes for sap_soap_rfc_system_info
        $system = $Form->query("select updated_at, data from notes 
            where host_id = %d and ntype in 
                ('sap.version.release',
                'sap.version.rfc_log',
                'sap.version.kernel',
                'system.os',
                'sap.db.hostname',
                'sap.db_system',
                'system.hostname',
                'system.ip.v4',
                'system.ip.v6',
                'sap.instance',
                'sap.rfc.destination',
                'system.timezone',
                'system.charset',
                'sap.daylight_saving_time',
                'sap.machine_id')", $id);
        foreach ($system as $key => $value) {
            $system[$key]['data'] = base64_decode($value['data']);
        }
        $this->system = $system;
        $this->assign("system",$system);

        //get notes for sap_soap_th_saprel_disclosure
        $saprel = $Form->query("select updated_at, data from notes 
            where host_id = %d and ntype in 
                ('os.kernel.version',
                'sap.time.compile',
                'sap.db.version',
                'sap.version.patch_level',
                'sap.version')", $id);
        foreach ($saprel as $key => $value) {
            $saprel[$key]['data'] = base64_decode($value['data']);
        }
        $this->saprel = $saprel;
        $this->assign("saprel",$saprel);

        //get loots for sap_soap_rfc_rzl_read_dir
        $readdir = $Form->query("select updated_at, path, 'Read Dir' as info from loots 
            where host_id = %d and ltype in ('sap.soap.rfc.dir')", $id);
        $this->readdir = $readdir;
        $this->assign("readdir",$readdir);

        //dump($notes);
    	$this->display();
    }

    public function auths(){
    	//dump($_GET['id']);
    	$id = I('get.id');
    	$Form = new Model();
    	$auths = $Form->query('select logins.id, publics.username, privates.data, logins.updated_at, 
    		services.port, services.state, services.name, hosts.address, logins.status
    		from metasploit_credential_logins as logins
            inner join metasploit_credential_cores as cores on logins.core_id = cores.id
    		inner join metasploit_credential_publics as publics on cores.public_id = publics.id
    		inner join metasploit_credential_privates as privates on cores.private_id = privates.id
            inner join services on logins.service_id = services.id
    		inner join hosts on services.host_id = hosts.id
    		where hosts.id = %d', $id);
    	//dump($auths);
    	$this->auths = $auths;
    	$this->assign("list",$auths);
    	$this->display();
    }

}