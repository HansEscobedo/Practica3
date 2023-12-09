import React from 'react';
import { Text, View, FlatList, StyleSheet } from 'react-native';

const FrameworkList = ({ frameworks }) => {
    return (
        <View style={styles.container}>
            <Text style={styles.title}>Frameworks:</Text>
            <FlatList
                data={frameworks}
                keyExtractor={(item) => item.id.toString()}
                renderItem={({ item }) => (
                    <View style={styles.frameworkContainer}>
                        <Text style={styles.label}>Nombre: </Text>
                        <Text style={styles.text}>{item.name}</Text>
                        <Text style={styles.label}>Nivel de conocimiento: </Text>
                        <Text style={styles.text}>{item.level}</Text>
                        <Text style={styles.label}>Año de utilización: </Text>
                        <Text style={styles.text}>{item.year}</Text>
                    </View>
                )}
            />
        </View>
    );
};

const styles = StyleSheet.create({
    container: {
        marginLeft: 20, // Ajusta el margen izquierdo según sea necesario
    },
    title: {
        color: '#4C1D95', // Color morado oscuro
        fontSize: 24, // Tamaño de letra más grande para el título
        fontWeight: 'bold', // Negrita
        marginBottom: 10, // Espacio entre el título y la lista
    },
    frameworkContainer: {
        marginBottom: 20, // Espacio entre elementos de la lista
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

export default FrameworkList;

