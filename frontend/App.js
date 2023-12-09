import React, { useEffect, useState } from 'react';
import { SafeAreaView, Text, View, StyleSheet, ScrollView,TouchableOpacity, Modal } from 'react-native';
import axios from 'axios';
import Profile from './src/components/Profile';
import FrameworkList from './src/components/FrameworkList';
import HobbyList from './src/components/HobbyList';
import { userApi } from "./src/helpers/ApiUser";
import EditProfileScreen from "./src/screens/EditProfile";

const App = () => {
  const [userData, setUserData] = useState(null);

  useEffect(() => {
    const fetchUserData = async () => {
      try {
        const response = await userApi.get(`/profile/1`);
        setUserData(response.data);
      } catch (error) {
        console.error('Error fetching user data:', error);
      }
    };

    fetchUserData();
  }, []);

  const navigateToEditProfile = () => {
    EditProfileScreen();
  }

  return (
      <SafeAreaView style={styles.container}>
        <ScrollView>
          <Text style={styles.titulo}>
            Perfil de usuario
          </Text>
          <Text style={styles.tituloBold}>{userData?.name || 'Nombre Desconocido'}</Text>
          <TouchableOpacity onPress={navigateToEditProfile}>
            <Text style={styles.editLink}>Editar Perfil</Text>
          </TouchableOpacity>
          <View style={styles.linea}></View>
          <View>
            {userData ? (
                <View>
                  <View style={styles.containerList}>
                    <Profile user={userData} />
                  </View>
                  <View style={styles.containerList}>
                    <FrameworkList frameworks={userData.user_frameworks} />
                  </View>
                  <View style={styles.containerList}>
                    <HobbyList hobbies={userData.user_hobbies} />
                  </View>
                </View>
            ) : (
                <Text style={styles.loadingText}>Loading...</Text>
            )}
          </View>
        </ScrollView>
      </SafeAreaView>
  );
};

const styles = StyleSheet.create({
  container: {
    backgroundColor: '#F3F4F6',
    flex: 1,
  },
  titulo: {
    marginTop: 40,
    marginBottom: 10, // Agregado para separar del contenido siguiente
    textAlign: 'center',
    fontSize: 30,
    color: '#374151',
    fontWeight: '600',
  },
  tituloBold: {
    marginBottom: 10, // Agregado para separar del contenido siguiente
    textAlign: 'center',
    fontSize: 30,
    fontWeight: '900',
    color: '#6D28D9',
  },
  linea: {
    height: 1,
    backgroundColor: '#A5B4FC',
    marginVertical: 10,
  },
  loadingText: {
    textAlign: 'center', // Centrar el texto mientras se carga
    marginTop: 20, // Espacio adicional en la parte superior
  },

  containerList: {
    marginLeft: 20,
    marginRight: 20,
    borderRadius: 10,
    borderWidth: 1,
    borderColor: '#6D28D9',
    padding: 10,
    marginBottom: 10,
    backgroundColor:'lightgray',
    elevation: 5,
  },
  editLink: {
    color: '#6D28D9',
    fontSize: 18,
    textAlign: 'center',
    textDecorationLine: 'underline',
    marginTop: 10,
  },

});

export default App;

