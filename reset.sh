docker stop $(docker ps -q)
docker rm $(docker ps -a -q)
docker rmi jh-lp_app
#rm -R ./linkplacer/vendor ./linkplacer/var
#docker compose up -d
