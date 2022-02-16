FROM registry.access.redhat.com/ubi8/ubi:8.0

MAINTAINER Red Hat Training <training@redhat.com>

LABEL Component="httpd" 

LABEL io.k8s.description="A basic Apache HTTP Server child image, uses ONBUILD" \
      io.k8s.display-name="Apache HTTP Server" \
      io.openshift.expose-services="8080:http" \
      io.openshift.tags="apache, httpd"

RUN yum -y update && yum -y install httpd && yum clean all

RUN mkdir -p /var/www/html

RUN echo "Hello" > /var/www/html/index.html

EXPOSE 80

RUN rm -rf /run/httpd && mkdir /run/httpd

CMD /usr/sbin/httpd -DFOREGROUND
