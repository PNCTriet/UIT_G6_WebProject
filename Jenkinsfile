pipeline {
    agent any

    environment {
        EC2_HOST = '184.72.192.165'  // Địa chỉ IP của máy EC2
    }

    stages {
        stage('Deploy to EC2') {
            steps {
                // Bước này để triển khai mã nguồn lên máy EC2
                script {
                    sshagent(['NetflopServer_Sub4_US_Green']) {
                        sh "scp -o StrictHostKeyChecking=no -r * ubuntu@${EC2_HOST}:/var/www/html/UIT_G6_WEBPROJECT_LARAVEL"
                    }
                }
            }
        }
    }
}
