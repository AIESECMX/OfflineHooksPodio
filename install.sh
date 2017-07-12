echo 'installing podio lib for php'
wget https://github.com/podio/podio-php/archive/4.3.0.tar.gz
sudo tar -xvzf 4.3.0.tar.gz -C /bin/
rm 4.3.0.tar.gz

#getting the lemonade lbrary
echo '\ngetting the lemonade library\n'
wget https://github.com/sofadesign/limonade/archive/master.zip

if  ! dpkg-query -l unzip ; then 
	sudo apt-get install unzip	
fi

if ! sudo unzip master.zip -d /bin; then 

	echo "failed to unzip make sure you hace the library  \n\n\t apt-get install unzip \n" 

else 
	echo 'unziped succesfully'
	rm master.zip
fi


#getting the php mailer
echo 'Getting the PHPMailer library'
wget https://github.com/PHPMailer/PHPMailer/archive/master.zip

if ! sudo unzip master.zip -d /bin; then 

	echo "failed to unzip make sure you hace the library  \n\n\t apt-get install unzip \n" 

else 
	echo 'unziped succesfully'
	rm master.zip
fi

echo '\n\n********************************'
echo '********************************\n\n'


