//�����б�Ͳ�������ʵ��
1,�������ݱ�posts���沩�����£������Ǩ��
   php artisan make:model --migration Post
2���������±�
    php artisan migrate
3��ͨ�����ݿ�ģ�͹�������������������������
    php artisan db:seed
4����configĿ¼���½�blog�������ļ���blog.php.����ͨ��config()������ȡ������
5������·�ɱ�
6�����������ʾ������
    php artisan make:controller BlogController [--plain]
7,�����ͼ�ļ���
    blog.index��ʾ�������£�
    blog.post��ʾĳһƪ����
8������bootstrap css�ļ�������֧�ַ�ҳ�л���ʽ
//============================================================================
