sudo wget -qO- https://deb.opera.com/archive.key | sudo apt-key add -
sudo add-apt-repository "deb [arch=i386,amd64] https://deb.opera.com/opera-stable/ stable non-free"
sudo sh -c 'echo "deb http://deb.opera.com/opera-stable/ stable non-free" >> /etc/apt/sources.list.d/opera.list' 
# sudo apt-get remove opera-stable
# sudo add-apt-repository multiverse
#sudo apt update -y
#sudo apt upgrade -y
sudo apt install -y gftp libreoffice-plasma libreoffice libreoffice-l10n-lv gimp inkscape tuxpaint gthumb vlc thunderbird stardict mc bluefish planner wine stellarium steam motion scratch 
#open shot video apstrades riks
sudo wget -q -O ch.deb https://dl.google.com/linux/direct/google-chrome-stable_current_amd64.deb
sudo chmod 777 ./ch.deb
sudo dpkg -i ./ch.deb

sudo wget -q -O sk.deb https://go.skype.com/skypeforlinux-64.deb
sudo chmod 777 ./sk.deb
sudo dpkg -i ./sk.deb


sudo wget -q -O osh https://github.com/OpenShot/openshot-qt/releases/download/v2.6.1/OpenShot-v2.6.1-x86_64.AppImage
sudo chmod 777 ./osh
./osh

# google earth
sudo wget -q -O ea https://dl.google.com/dl/earth/client/current/google-earth-pro-stable_current_amd64.deb
sudo dpkg -i ./ea

#visual studio code
sudo wget -q -O c https://go.microsoft.com/fwlink/?LinkID=760868
sudo dpkg -i ./c

sudo apt install -y opera-stable
