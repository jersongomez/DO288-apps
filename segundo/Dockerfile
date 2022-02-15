FROM registry.access.redhat.com/ubi8/ubi:8.0

MAINTAINER Red Hat Training <training@redhat.com>

# DocumentRoot for Apache
ENV DOCROOT=/var/www/html 
LABEL io.openshift.expose-services="8080:http"

LABEL io.k8s.description="A basic Apache HTTP Server child image, uses ONBUILD" \
      io.k8s.display-name="Apache HTTP Server" \
      io.openshift.expose-services="8080:http" \
      io.openshift.tags="apache, httpd"

RUN   yum install -y --nodocs --disableplugin=subscription-manager httpd && \
      yum clean all --disableplugin=subscription-manager -y && \
      echo "Hello from the httpd-parent container!" > ${DOCROOT}/index.html

# Allows child images to inject their own content into DocumentRoot
ONBUILD COPY src/ ${DOCROOT}/
RUN sed -i "s/#ServerName www.example.com:80/ServerName 0.0.0.0:8080/g" /etc/httpd/conf/httpd.conf
RUN sed -i "s/Listen 80/Listen 8080/g" /etc/httpd/conf/httpd.conf
EXPOSE 8080
RUN chgrp -R 0 /var/log/httpd /var/run/httpd && chmod -R g=u /var/log/httpd /var/run/httpd

# This stuff is needed to ensure a clean start
RUN rm -rf /run/httpd && mkdir /run/httpd

# Run as the root user
USER 1001

# Launch httpd
CMD /usr/sbin/httpd -DFOREGROUND
