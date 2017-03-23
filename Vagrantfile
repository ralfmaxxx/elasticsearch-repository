VAGRANTFILE_API_VERSION = "2"

Vagrant.configure(VAGRANTFILE_API_VERSION) do |config|
    if defined?(VagrantVbguest::Middleware)
    config.vbguest.auto_update = true
    end

    config.vm.box = "ubuntu/trusty64"
    config.vm.provision "shell", path: 'vagrant/provision.sh'

    config.vm.provision "docker" do |d|
        config.vm.provision "docker",
            images: [
                "elasticsearch:5.2.2",
                "elasticsearch:2.4.4"
            ]
        d.run "elasticsearch:5.2.2 -Ehttp.port=9201 -Etransport.tcp.port=9301 -Ehttp.host=0.0.0.0 -Etransport.host=127.0.0.1", args: "--name elastic5 -p 9201:9201 -p 9301:9301", auto_assign_name: false
        d.run "elasticsearch:2.4.4", args: "--name elastic2 -p 9200:9200 -p 9300:9300", auto_assign_name: false
    end

    config.vm.define 'elasticsearch-repository' do |node|
        node.vm.hostname = 'elasticsearch-repository.local'
        node.vm.network :private_network, ip: '192.168.12.12'
    end

    config.vm.provider :virtualbox do |vb|
        vb.customize ["modifyvm", :id, "--cpus", "2", "--memory", "4096"]
    end

    config.vm.synced_folder "./", "/vagrant", type: "nfs",  mount_options: ['rw', 'vers=3', 'tcp', 'fsc' ,'actimeo=2']

    config.hostmanager.enabled = true
    config.hostmanager.manage_host = true
end
