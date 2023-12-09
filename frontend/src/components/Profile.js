import React from 'react';
import { Text, View, StyleSheet } from 'react-native';

const Profile = ({ user }) => {
    return (
        <View style={styles.container}>
            <Text style={styles.label}>Nombre: </Text>
            <Text style={styles.text}>{user.name}</Text>
            <Text style={styles.label}>Apellido: </Text>
            <Text style={styles.text}>{user.last_name}</Text>
            <Text style={styles.label}>Correo: </Text>
            <Text style={styles.text}>{user.email}</Text>
            <Text style={styles.label}>Ciudad: </Text>
            <Text style={styles.text}>{user.city}</Text>
            <Text style={styles.label}>País: </Text>
            <Text style={styles.text}>{user.country}</Text>
            <Text style={styles.label}>Sobre mí: </Text>
            <Text style={styles.text}>{user.summary}</Text>
        </View>
    );
};

const styles = StyleSheet.create({
    container: {
        marginLeft: 20, // Ajusta el margen izquierdo según sea necesario
    },
    label: {
        color: '#6D28D9', // Color morado
        fontSize: 18, // Tamaño de letra más grande
        marginBottom: 5, // Espacio entre etiquetas y texto
    },
    text: {
        fontSize: 16, // Tamaño de letra para el texto
        marginBottom: 10, // Espacio entre líneas de texto
    },
});

export default Profile;

